========== BANCO DE DADOS ===========

Conceito: Conjunto de dados organizados e estruturados para serem armazenados, manipulados e consultados por meio de um Sistema Gerenciador de Banco de Dados (SGBD).

Tipos: Relacional e Não Relacional.

======== BANCO DE DADOS RELACIONAL ==========

Conceito: Conjunto de dados organizados em tabelas (linhas e colunas) com estrutura rígida, respeitando regras de integridade e relacionamentos.

Prós: Consistência e integridade dos dados, padronização, facilidade de consulta e segurança.
Contras: Menos flexível, dificuldade de escalar horizontalmente, desempenho reduzido para grandes volumes de dados não estruturados, custo de licenciamento em alguns SGBDs.
Linguagem: SQL (Structured Query Language).
Exemplos de bancos: Oracle, MySQL/MariaDB, PostgreSQL, SQL Server, DB2.

======== BANCO DE DADOS NÃO RELACIONAL ==========

Conceito: Conjunto de dados organizados em modelos flexíveis (sem esquema fixo), podendo ser chave-valor, documento, coluna ou grafo.

Prós: Alta flexibilidade, escalabilidade horizontal, ótimo desempenho para Big Data, alta disponibilidade e replicação facilitada.
Contras: Menor consistência, ausência de padrão universal, maior complexidade de escolha do modelo, custo de infraestrutura em larga escala.
Linguagem: JSON, BSON, Redis CLI, MQL (Mongo Query Language).
Exemplos de bancos: MongoDB (documento), Redis (chave-valor), Cassandra (coluna), Neo4j (grafo), Firebase Firestore (documento).

======== ARQUITETURA E ADMINISTRAÇÃO ==========

Conceito: Conjunto de práticas e ferramentas utilizadas para gerenciar, manter e otimizar um banco de dados.

Pontos-chave:

*Gerenciamento de usuários, permissões e segurança.
*Backup e recuperação de dados.
*Monitoramento de desempenho.
*Tuning e otimização de consultas.
*Índices (B-Tree, Hash, Bitmap).
*Transações e concorrência (ACID: Atomicidade, Consistência, Isolamento, Durabilidade).
*Níveis de isolamento (Read Uncommitted, Read Committed, Repeatable Read, Serializable).

======== TÓPICOS AVANÇADOS ==========

Conceito: Áreas especializadas de banco de dados que ampliam o uso para cenários de alta demanda, análise e integração com outras tecnologias.

Principais tópicos:
*Triggers, Procedures, Functions e Views.
*Data Warehouse e OLAP: modelagem dimensional (fatos e dimensões, esquemas estrela e floco de neve).
*Big Data e Bancos Distribuídos: Hadoop, Spark, Cassandra.
*ETL (Extract, Transform, Load): integração e preparação de dados.
*CAP Theorem: equilíbrio entre Consistência, Disponibilidade e Tolerância a Partição.
*Banco de dados em nuvem: AWS RDS, Google Cloud SQL, Azure SQL.
*Segurança: criptografia de dados em trânsito e repouso, mascaramento de dados.


====== SQL DESCOMPLICADO ==========

Exemplo prático CRUD

C - Create = Insert
R - Read = Select
U - Update = Update
D - Delete = Delete

Principais comandos e seus usos:

*SELECT = Busca de dados aninhado com as condições, exemplo: SELECT * FROM tabela.
*INSERT = Inserir dados em uma tabela geralmente com o parâmetro sendo: INSERT INTO tabela(campo1,campo2) VALUES ('campo1valor','campo2valor').
*UPDATE = Altera os dados de uma tabela, exemplo: UPDATE tabela SET campo1 = 'campo1valor'.
*DELETE = Apaga os dados de uma tabela, exemplo: DELETE FROM tabela WHERE campo1 = 'campo1valor'.
*JOIN = Aninha duas tabelas tendo suas variações dependendo do argumento:
** LEFT JOIN = Retorna todos os registros da tabela da esquerda, e os correspondentes da direita.
** RIGHT JOIN = Retorna todos os registros da tabela da direita, e os correspondentes da esquerda.
** INNER JOIN = Retorna somente os registros correspondentes em ambas as tabelas.
** FULL JOIN = Retorna todos os registros de ambas as tabelas.
** CROSS JOIN = Retorna o produto cartesiano das tabelas (cada linha da esquerda combinada com todas da direita).
** SELF JOIN = É quando uma tabela faz JOIN consigo mesma.


========= CURSOS RECOMENDADOS ===========

*O curso completo de Banco de Dados e SQL, sem mistérios! - Felipe Mafra, Link: https://www.udemy.com/course/bancos-de-dados-relacionais-basico-avancado
*Banco de Dados SQL do Zero ao Avançado + Projetos Reais - Andre Iacono, Link: https://www.udemy.com/course/curso-sql-do-zero-ao-avancado 