<?php
require 'vendor/autoload.php'; // PhpSpreadsheet via Composer

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Definição dos grupos e prefixos de abas
    $grupos = [
        'arquivo_aging'     => 'Aging',
        'arquivo_backlog'   => 'Backlog',
        'arquivo_pendencia' => 'Pendencia'
    ];

    $spreadsheetFinal = new Spreadsheet();
    $spreadsheetFinal->removeSheetByIndex(0); // Remove aba padrão

    foreach ($grupos as $inputName => $prefixo) {

        if (!isset($_FILES[$inputName])) {
            continue;
        }

        $arquivos = $_FILES[$inputName];
        for ($i = 0; $i < count($arquivos['name']); $i++) {
            $tmpName = $arquivos['tmp_name'][$i];
            $nomeOriginal = $arquivos['name'][$i];

            if ($tmpName === '' || !file_exists($tmpName)) {
                continue;
            }

            $ext = strtolower(pathinfo($nomeOriginal, PATHINFO_EXTENSION));
            if (!in_array($ext, ['xls', 'xlsx'])) {
                continue;
            }

            // Define INC ou RITM pelo nome do arquivo
            $sufixo = (stripos($nomeOriginal, 'incident') === 0) ? 'INC' : 'RITM';
            $nomeAba = "{$prefixo}-{$sufixo}";

            // Garante que não haja duplicados
            $nomeOriginalAba = $nomeAba;
            $contador = 1;
            while ($spreadsheetFinal->getSheetByName($nomeAba) !== null) {
                $nomeAba = $nomeOriginalAba . $contador;
                $contador++;
            }

            // Carrega o arquivo
            $planilha = IOFactory::load($tmpName);
            $sheetOrigem = $planilha->getActiveSheet();
            $rows = $sheetOrigem->toArray();

            // Cria nova aba
            $sheetFinal = $spreadsheetFinal->createSheet();
            $sheetFinal->setTitle($nomeAba);

            // Copia dados
            $linhaAtual = 1;
            foreach ($rows as $index => $row) {
                $sheetFinal->fromArray($row, null, 'A' . $linhaAtual);

                // Cabeçalho em negrito
                if ($index === 0) {
                    $highestColumn = $sheetFinal->getHighestColumn();
                    $sheetFinal->getStyle("A{$linhaAtual}:{$highestColumn}{$linhaAtual}")
                        ->getFont()->setBold(true);
                }
                $linhaAtual++;
            }

            // Ajusta largura automática das colunas
            $highestColumn = $sheetFinal->getHighestColumn();
            $highestColumnIndex = Coordinate::columnIndexFromString($highestColumn);
            for ($col = 1; $col <= $highestColumnIndex; $col++) {
                $sheetFinal->getColumnDimensionByColumn($col)->setAutoSize(true);
            }
        }
    }

    // Nome final do arquivo
    $dataHoje = date('d/m/Y');
    $nomeArquivo = "Bom dia EDP_{$dataHoje}.xlsx";

    // Força download
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("Content-Disposition: attachment; filename=\"{$nomeArquivo}\"");
    header('Cache-Control: max-age=0');

    $writer = new Xlsx($spreadsheetFinal);
    $writer->save('php://output');
    exit;
}
