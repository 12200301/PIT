-- Código para criar o banco de dados
create database pit;

use pit;

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUser` int NOT NULL AUTO_INCREMENT,
  `name` varchar(160) NOT NULL,
  `email` varchar(160) NOT NULL,
  `senha` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `email` (`email`)
) ENGINE = InnoDB AUTO_INCREMENT = 23 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `places` (
  `idPlace` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `categoria` varchar(40) DEFAULT NULL,
  `descricao` varchar(600) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `endereco` varchar(60) NOT NULL,
  `numero` int NOT NULL,
  `bairro` varchar(60) DEFAULT NULL,
  `cidade` varchar(60) DEFAULT NULL,
  `cep` char(9) DEFAULT NULL,
  `telefone` char(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `emailPlace` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `site` varchar(60) DEFAULT NULL,
  `insta` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `img` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `waze` varchar(200) NOT NULL,
  `horarios` json DEFAULT NULL,
  PRIMARY KEY (`idPlace`)
) ENGINE = InnoDB AUTO_INCREMENT = 9 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `favoritos` (
  `idFav` int NOT NULL AUTO_INCREMENT,
  `fk_idUser` int NOT NULL,
  `fk_idPlace` int NOT NULL,
  PRIMARY KEY (`idFav`),
  UNIQUE KEY `fk_idPlace` (`fk_idPlace`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `comentarios` (
  `idComent` int NOT NULL AUTO_INCREMENT,
  `coment` varchar(200) NOT NULL,
  `datahora` timestamp NOT NULL,
  `fk_idUser` int NOT NULL,
  PRIMARY KEY (`idComent`),
  KEY `fk_idUser` (`fk_idUser`)
) ENGINE = InnoDB AUTO_INCREMENT = 151 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `avaliacoes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fk_idPlace` int DEFAULT NULL,
  `fk_idUser` int DEFAULT NULL,
  `nota` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_idPlace` (`fk_idPlace`),
  KEY `fk_idUser` (`fk_idUser`)
);

INSERT INTO
  `avaliacoes` (`id`, `fk_idPlace`, `fk_idUser`, `nota`)
VALUES
  (16, 1, 17, 4),
  (17, 1, 17, 5),
  (18, 1, 17, 4),
  (19, 1, 17, 4),
  (20, 1, 17, 3);

INSERT INTO
  `comentarios` (`idComent`, `coment`, `datahora`, `fk_idUser`)
VALUES
  (144, 'ola', '2024-10-19 00:46:44', 17),
  (145, 'bom dia', '2024-10-19 00:46:59', 17),
  (146, 'josue', '2024-10-19 00:47:30', 17),
  (147, 'josue', '2024-10-19 00:47:49', 17),
  (148, 'jair', '2024-10-19 00:47:56', 17),
  (149, 'josue', '2024-10-19 00:48:02', 17),
  (150, 'jalson', '2024-10-19 01:21:22', 17);

INSERT INTO
  `places` (
    `idPlace`,
    `nome`,
    `categoria`,
    `descricao`,
    `endereco`,
    `numero`,
    `bairro`,
    `cidade`,
    `cep`,
    `telefone`,
    `emailPlace`,
    `site`,
    `insta`,
    `img`,
    `waze`,
    `horarios`
  )
VALUES
  (
    1,
    'Mercado Central',
    'Comércio',
    'O Mercado Central (atualmente Mercado Central KTO, por questões de patrocínio), e anteriormente denominado Mercado Municipal de Belo Horizonte, é um mercado localizado no Centro de Belo Horizonte, na cidade de Belo Horizonte, no Brasil. Foi criado em 7 de setembro de 1929 pelo então prefeito Cristiano Machado. Pertenceu à Prefeitura de Belo Horizonte até 1964. Seu galpão ocupa um quarteirão inteiro do Centro da cidade, sendo a entrada principal voltada para a avenida Augusto de Lima.',
    'Av. Augusto de Lima',
    744,
    'Centro',
    'Belo Horizonte',
    '30190-922',
    '(31) 3274-9434',
    'faleconosco@mercadocentral.com.br',
    'https://mercadocentral.com.br',
    'https://www.instagram.com/mercadocentralbh?utm_sou',
    'https://mercadocentral.com.br/sitenovo/wp-content/uploads/2024/01/FACHADA-DA-PINTURA-NOVA-37-scaled.jpg',
    'https://ul.waze.com/ul?preview_venue_id=207160897.2071346824.480606&navigate=yes&utm_campaign=default&utm_source=waze_website&utm_medium=lm_share_location',
    '{\"sexta\": \"08:00 - 18:00\", \"terca\": \"08:00 - 18:00\", \"quarta\": \"08:00 - 18:00\", \"quinta\": \"08:00 - 18:00\", \"sabado\": \"08:00 - 18:00\", \"domingo\": \"08:00 - 13:00\", \"segunda\": \"08:00 - 18:00\"}'
  ),
  (
    2,
    'Praça do Papa',
    'Praça',
    'A Praça do Papa é um ponto turístico localizado em Belo Horizonte, Minas Gerais, Brasil. Ela é assim chamada em homenagem ao Papa João Paulo II, que visitou a cidade em 1980. A praça fica no alto de u',
    'Av. Agulhas Negras',
    0,
    'mangabeiras',
    'Belo Horizonte',
    '30210-060',
    '(31) 35551100',
    'cgpd@cmbh.mg.gov.br',
    'https://www.pracadopapa.com.br',
    'https://www.instagram.com/explore/locations/343541/praca-do-papa/?hl=pt-br',
    'https://upload.wikimedia.org/wikipedia/commons/e/ef/Praca_do_Papa%2C_Belo_Horizonte_%28cropped%29.jpg',
    'https://ul.waze.com/ul?place=ChIJo5H0p1KYpgARVtON1z7_ACU&ll=-19.95612270%2C-43.91504370&navigate=yes&utm_campaign=default&utm_source=waze_website&utm_medium=lm_share_location',
    '{\"sexta\": \"24 horas\", \"terca\": \"24 horas\", \"quarta\": \"24 horas\", \"quinta\": \"24 horas\", \"sabado\": \"24 horas\", \"domingo\": \"24 horas\", \"segunda\": \"24 horas\"}'
  ),
  (
    3,
    'Praça da Estação',
    'Praça',
    'Conhecida como Praça da Estação, a Praça Rui Barbosa faz parte da Zona Cultural Praça da Estação, que também contempla o Museu de Artes e Ofícios, Casa do Conde de Santa Marinha, Centro Cultural da Un',
    'Av. dos Andradas',
    201,
    'Centro',
    'Belo Horizonte',
    '30110-009',
    ' (31) 35551100',
    'cgpd@cmbh.mg.gov.br',
    'https://portalbelohorizonte.com.br/filmcommission/cenarios-d',
    'https://www.instagram.com/explore/locations/667430586763978/praca-da-estacao-bh/',
    'https://www.hojeemdia.com.br/image/policy:1.822039.1671229484:1671229484/image.jpg?w=1280&',
    'https://ul.waze.com/ul?place=ChIJL0cmA_qZpgARsZVNvKDmMT4&ll=-19.91681580%2C-43.93390200&navigate=yes&utm_campaign=default&utm_source=waze_website&utm_medium=lm_share_location',
    '{\"sexta\": \"24 horas\", \"terca\": \"24 horas\", \"quarta\": \"24 horas\", \"quinta\": \"24 horas\", \"sabado\": \"24 horas\", \"domingo\": \"24 horas\", \"segunda\": \"24 horas\"}'
  ),
  (
    4,
    'Lagoa da Pampulha',
    'Lagoa',
    'A Lagoa da Pampulha é uma lagoa situada na região da Pampulha no município de Belo Horizonte no Estado de Minas Gerais. Faz parte de um complexo de monumentos arquitetônicos concebidos por Oscar Nieme',
    'Av. Otacílio Negrão de Lima',
    3128,
    'São Luiz',
    'Belo Horizonte',
    '31365-450',
    '(31) 3555-1100',
    'cgpd@cmbh.mg.gov.br',
    'https://pt.wikipedia.org/wiki/Lagoa_da_Pampulha',
    'https://www.instagram.com/lagoadapampulha.oficial?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0',
    'https://t3.ftcdn.net/jpg/05/47/79/54/360_F_547795445_ZsQZdQ5RyOXa1XrBWzUiuNBTxJguqMUa.jpg',
    'https://ul.waze.com/ul?preview_venue_id=207095361.2071084687.320972&navigate=yes&utm_campaign=default&utm_source=waze_website&utm_medium=lm_share_location',
    '{\"sexta\": \"24 horas\", \"terca\": \"24 horas\", \"quarta\": \"24 horas\", \"quinta\": \"24 horas\", \"sabado\": \"24 horas\", \"domingo\": \"24 horas\", \"segunda\": \"24 horas\"}'
  ),
  (
    5,
    'Praça da Liberdade',
    'Praça',
    'O complexo paisagistico e arquitetônico da Praça da Liberdade é uma síntese dos estilos que marcam a história de Belo Horizonte, e fica na região da Savassi, no encontro de quatro grandes avenidas: Bias Fortes, Brasil, Cristóvão Colombo e João Pinheiro.',
    'Praça da Liberdade',
    0,
    'Funcionários',
    'Belo Horizonte',
    '30140-010',
    '(31) 3516-7200',
    'circuitoliberdade@fcs.mg.gov.br',
    'http://circuitoliberdade.mg.gov.br/pt-br/circuito-liberdade/',
    'https://www.instagram.com/pracadaliberdadebh?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxN',
    'https://cdn.blablacar.com/wp-content/uploads/br/2024/04/05095336/bh-praca-da-liberdade-2.webp',
    'https://ul.waze.com/ul?place=EkVQcmHDp2EgZGEgTGliZXJkYWRlIC0gU2F2YXNzaSwgQmVsbyBIb3Jpem9udGUgLSBNRywgMzAxNDAtMDEwLCBCcmF6aWwiLiosChQKEgmNToQz3JmmABH5k_M0h-7DJRIUChIJq2gFa9uZpgARu1B2RPRuql8&ll=-19.9329',
    '{\"sexta\": \"24 horas\", \"terca\": \"24 horas\", \"quarta\": \"24 horas\", \"quinta\": \"24 horas\", \"sabado\": \"24 horas\", \"domingo\": \"24 horas\", \"segunda\": \"24 horas\"}'
  ),
  (
    6,
    'Mineirão',
    'Estádio de Futebol',
    'O Estádio Governador Magalhães Pinto, mais conhecido como Mineirão, é um estádio de futebol localizado em Belo Horizonte, Minas Gerais, onde o Cruzeiro Esporte Clube realiza seus jogos. Inaugurado em 1965, é o quinto maior estádio do Brasil, já tendo sediado cinco finais da Copa Libertadores, uma Copa Intercontinental e escolhido como uma das sedes da Copa do Mundo FIFA de 2014. Em 2003, foi tombado pelo Conselho Deliberativo do Patrimônio Cultural do Município de Belo Horizonte.',
    'Av. Antônio Abrahão Caram',
    1001,
    'São José',
    'Belo Horizonte',
    '31275-000',
    '(31) 3499-4333',
    'atendimento@estadiomineirao.com.br',
    'https://mineirao.com.br',
    'https://www.instagram.com/mineirao?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==',
    'https://www.cafebarao.com.br/wp-content/uploads/2021/01/Mineirao_1280x720px.jpg',
    'https://ul.waze.com/ul?preview_venue_id=207095361.2071150221.319593&navigate=yes&utm_campaign=default&utm_source=waze_website&utm_medium=lm_share_location',
    '{\"sexta\": \"07:00 - 22:00\", \"terca\": \"07:00 - 22:00\", \"quarta\": \"07:00 - 22:00\", \"quinta\": \"07:00 - 22:00\", \"sabado\": \"07:00 - 22:00\", \"domingo\": \"07:00 - 22:00\", \"segunda\": \"07:00 - 22:00\"}'
  ),
  (
    7,
    'Parque das Mangabeiras',
    'Parque',
    'Localizado ao pé da Serra do Curral, patrimônio cultural de Belo Horizonte, o Parque das Mangabeiras Maurício Campos, projetado pelo paisagista Roberto Burle Marx, conserva em sua área de 2,4 milhões de m2, 59 nascentes do Córrego da Serra, que integra a Bacia do Rio São Francisco.',
    'Av. José do Patrocínio Pontes',
    580,
    'Mangabeiras',
    'Belo Horizonte',
    '30210-090',
    '(31) 3277-8277',
    'mangaba@pbh.gov.br',
    'https://prefeitura.pbh.gov.br/fundacao-de-parques-e-zoobotan',
    'https://www.instagram.com/explore/locations/265178215/parque-das-mangabeiras-bh/',
    'https://prefeitura.pbh.gov.br/sites/default/files/noticia/img/2017-06/15247728924_633b3bc065_k.jpg',
    'https://ul.waze.com/ul?preview_venue_id=207160897.2071608965.320374&navigate=yes&utm_campaign=default&utm_source=waze_website&utm_medium=lm_share_location',
    '{\"sexta\": \"08:00 - 17:00\", \"terca\": \"08:00 - 17:00\", \"quarta\": \"08:00 - 17:00\", \"quinta\": \"08:00 - 17:00\", \"sabado\": \"08:00 - 17:00\", \"domingo\": \"08:00 - 17:00\", \"segunda\": \"fechado\"}'
  ),
  (
    8,
    'Palácio das Artes',
    'Entreterimento',
    'O Palácio das Artes, vinculado à Fundação Clóvis Salgado, é o maior centro de produção, formação e difusão cultural de Minas Gerais e um dos maiores da América Latina. Está localizado em Belo Horizonte e ocupa uma área 18.000 m² dentro do Parque Municipal Américo Renné Giannetti.',
    'Av. Afonso Pena',
    1537,
    'Centro',
    'Belo Horizonte',
    '30120-010',
    '(31) 3236-7400',
    'https://fcs.mg.gov.br/contato/fale-conosco/',
    'https://fcs.mg.gov.br/espacos-culturais/palacio-das-artes/',
    'https://www.instagram.com/palaciodasartes_?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=',
    'https://soubh.uai.com.br/uploads/place/image/1382/palacio-das-artes-20141013191744.jpg',
    'https://ul.waze.com/ul?preview_venue_id=207160897.2071412359.463094&navigate=yes&utm_campaign=default&utm_source=waze_website&utm_medium=lm_share_location',
    '{\"sexta\": \"09:00 - 22:00\", \"terca\": \"09:00 - 22:00\", \"quarta\": \"09:00 - 22:00\", \"quinta\": \"09:00 - 22:00\", \"sabado\": \"09:00 - 22:00\", \"domingo\": \"09:00 - 22:00\", \"segunda\": \"09:00 - 22:00\"}'
  );

INSERT INTO
  `usuarios` (`idUser`, `name`, `email`, `senha`)
VALUES
  (17, 'Matheus', 'matbraga14@gmail.com', '1234'),
  (18, 'jair', 'jair@gmail.com', '1234'),
  (19, 'gilson', 'gilson@gmail.com', '1234'),
  (20, 'cleiton', 'cleiton@gmail.com', '1234'),
  (21, 'gleison', 'gleicin@gmail.com', '1234'),
  (22, 'jeff', 'jeff@gmail.com', '1234');

ALTER TABLE
  `avaliacoes`
ADD
  CONSTRAINT `avaliacoes_ibfk_1` FOREIGN KEY (`fk_idPlace`) REFERENCES `places` (`idPlace`),
ADD
  CONSTRAINT `avaliacoes_ibfk_2` FOREIGN KEY (`fk_idUser`) REFERENCES `usuarios` (`idUser`);

COMMIT;