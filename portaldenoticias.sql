-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29/11/2024 às 16:57
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `portaldenoticias`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_noticias`
--

CREATE TABLE `tbl_noticias` (
  `id` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `corpo_noticia` longtext NOT NULL,
  `data_hora` datetime NOT NULL,
  `caminho_foto` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_noticias`
--

INSERT INTO `tbl_noticias` (`id`, `id_autor`, `titulo`, `corpo_noticia`, `data_hora`, `caminho_foto`) VALUES
(1, 4, 'JEMERSON TEM 3 GOLS PELO CRUZEIRO', 'Detalhe: ele nunca jogou pelo cruzeiro', '2024-11-28 01:03:59', '/portaldenoticias/src/assets/uploads/6747b35700603.jpg'),
(3, 3, 'GOL DO HOMEM', 'BRAITWHAITE ACABA DE FAZER SEU OITAVO GOL ENQUANTO JOGADOR DO GREMIO, O TIME MAIS FODA DO MUNDO!', '2024-11-28 01:21:18', '/portaldenoticias/src/assets/uploads/6747b77e9d320.jpg'),
(4, 1, 'Eleições 2024: Debate presidencial esquenta com propostas polêmicas', 'Durante o debate desta noite, os candidatos à presidência apresentaram propostas sobre economia e segurança pública. O destaque ficou para as trocas de farpas entre os dois líderes das pesquisas aqui de sapucaia do sul!', '2024-11-28 19:55:06', '/portaldenoticias/src/assets/uploads/6747b35700603.jpg'),
(5, 3, 'Moda sustentável: Estilistas apostam em tecidos reciclados na nova coleção', 'A nova temporada da moda trouxe uma surpresa: várias marcas renomadas lançaram coleções feitas inteiramente de materiais reciclados, destacando a importância da sustentabilidade no setor.', '2024-11-28 19:54:30', '/portaldenoticias/src/assets/uploads/6747b77e9d320.jpg'),
(6, 4, 'Copa do Mundo 2026: Seleção brasileira enfrenta grupo desafiador', 'O sorteio dos grupos da Copa do Mundo trouxe desafios para a seleção brasileira, que enfrentará grandes potências no futebol já na primeira fase do torneio.', '2024-11-28 19:54:30', '/portaldenoticias/src/assets/uploads/6747b35700603.jpg'),
(7, 1, 'Economia global em alerta: inflação nos EUA impacta mercados emergentes', 'O aumento na taxa de juros americana causou impacto direto nos mercados emergentes, incluindo o Brasil, que vê sua moeda desvalorizada frente ao dólar.', '2024-11-28 19:54:30', '/portaldenoticias/src/assets/uploads/6747b77e9d320.jpg'),
(8, 3, 'Nova tendência fitness: treinos ao ar livre crescem 50% em um ano', 'Com a pandemia ficando para trás, a prática de exercícios ao ar livre se tornou uma tendência crescente, com academias investindo em programas externos.', '2024-11-28 19:54:30', '/portaldenoticias/src/assets/uploads/6747b35700603.jpg'),
(9, 4, 'Cinema brasileiro conquista Hollywood com nova produção', 'O filme nacional \"Sob o Céu do Sertão\" foi indicado ao Oscar na categoria de Melhor Filme Estrangeiro, um marco para a indústria cinematográfica do país.', '2024-11-28 19:54:30', '/portaldenoticias/src/assets/uploads/6747b77e9d320.jpg'),
(10, 1, 'Energias renováveis: Brasil lidera na produção de energia eólica', 'O Brasil ultrapassou a marca histórica de 100 gigawatts de energia gerada por fontes renováveis, consolidando-se como líder mundial em energia eólica.', '2024-11-28 19:54:30', '/portaldenoticias/src/assets/uploads/6747b35700603.jpg'),
(11, 3, 'Nova lei de trânsito proíbe celulares ao volante em todo o país', 'A nova legislação aumenta as multas para quem for pego usando celular enquanto dirige, buscando reduzir os altos índices de acidentes nas rodovias.', '2024-11-28 19:54:30', '/portaldenoticias/src/assets/uploads/6747b77e9d320.jpg'),
(12, 4, 'Estudo revela os alimentos mais consumidos no Brasil em 2024', 'Uma pesquisa realizada pelo IBGE aponta que o arroz e o feijão continuam sendo os itens mais presentes na mesa dos brasileiros, seguidos por carnes e hortaliças.', '2024-11-28 19:54:30', '/portaldenoticias/src/assets/uploads/6747b35700603.jpg'),
(13, 1, 'Startup brasileira cria app para monitorar saúde mental', 'Uma startup nacional desenvolveu um aplicativo que ajuda a identificar sinais de ansiedade e depressão, oferecendo suporte online.', '2024-11-28 19:54:30', '/portaldenoticias/src/assets/uploads/6747b77e9d320.jpg'),
(14, 3, 'Inteligência artificial revoluciona setor de atendimento ao cliente', 'Com novas ferramentas baseadas em IA, empresas estão reduzindo os tempos de resposta e melhorando a experiência dos consumidores.', '2024-11-28 19:54:30', '/portaldenoticias/src/assets/uploads/6747b35700603.jpg'),
(15, 4, 'Desmatamento na Amazônia tem redução de 25% em 2024', 'O governo anunciou que novas políticas de preservação levaram à maior redução no desmatamento da Amazônia em uma década.', '2024-11-28 19:54:30', '/portaldenoticias/src/assets/uploads/6747b77e9d320.jpg'),
(16, 1, 'Pesquisa aponta crescimento da leitura entre jovens brasileiros', 'O índice de leitura entre jovens brasileiros cresceu 15% nos últimos dois anos, impulsionado por programas de incentivo nas escolas.', '2024-11-28 19:54:30', '/portaldenoticias/src/assets/uploads/6747b35700603.jpg'),
(17, 3, 'Show do Coldplay no Brasil bate recorde de público', 'A banda britânica Coldplay encerrou sua turnê no Brasil com um público de mais de 100 mil pessoas no Maracanã.', '2024-11-28 19:54:30', '/portaldenoticias/src/assets/uploads/6747b77e9d320.jpg'),
(18, 4, 'Mercado imobiliário aquece com programas de financiamento acessível', 'O setor imobiliário registrou crescimento de 20% após o lançamento de programas que facilitam a compra da casa própria.', '2024-11-28 19:54:30', '/portaldenoticias/src/assets/uploads/6747b35700603.jpg'),
(19, 1, 'Astronomia: chuva de meteoros será visível neste fim de semana', 'Especialistas confirmaram que a chuva de meteoros Perseidas será visível em todo o território nacional, proporcionando um espetáculo único.', '2024-11-28 19:54:30', '/portaldenoticias/src/assets/uploads/6747b77e9d320.jpg'),
(20, 3, 'Hackers invadem sistemas de grandes empresas brasileiras', 'Um grupo de hackers realizou um ataque em larga escala, comprometendo informações de clientes de pelo menos 10 grandes companhias nacionais.', '2024-11-28 19:54:30', '/portaldenoticias/src/assets/uploads/6747b35700603.jpg'),
(21, 4, 'Festival de gastronomia atrai turistas do mundo todo', 'O evento \"Sabores do Brasil\" reúne chefs renomados e promete movimentar a economia local com a vinda de turistas estrangeiros.', '2024-11-28 19:54:30', '/portaldenoticias/src/assets/uploads/6747b77e9d320.jpg'),
(22, 1, 'Projeto de lei busca regulamentar criptoativos no Brasil', 'O Congresso está discutindo um projeto de lei que estabelece regras claras para o uso e comercialização de criptomoedas no país.', '2024-11-28 19:54:30', '/portaldenoticias/src/assets/uploads/6747b35700603.jpg'),
(23, 3, 'Pesquisa revela impacto do TikTok na cultura digital', 'Um estudo aponta que o TikTok se tornou a principal plataforma para tendências culturais e influência entre jovens.', '2024-11-28 19:54:30', '/portaldenoticias/src/assets/uploads/6747b77e9d320.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(800) NOT NULL,
  `fone` varchar(20) NOT NULL,
  `genero` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id`, `nome`, `email`, `senha`, `fone`, `genero`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$cyyhVFZudxAPSJvHYlhIMOiFRjoB0WEbfMGwTBFuTqmCG85ICz1uK', '(51) 985642400', 'M'),
(3, 'kathleen', 'kath@gmail.com', '$2y$10$kioBBIcjP5hnYXl95gXg9OVsvwyAx0UC3EV3Kwx9W1cEjQjhLd9AO', 'asjdajsd', 'F');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbl_noticias`
--
ALTER TABLE `tbl_noticias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_noticias`
--
ALTER TABLE `tbl_noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
