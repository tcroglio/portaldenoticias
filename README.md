# Portal de Notícias

Este é o **Portal de Notícias**, um sistema desenvolvido para a criação, publicação e visualização de notícias, ideal para projetos que envolvem a disseminação de informações de forma dinâmica e intuitiva.

## 📖 Proposta do Projeto

O objetivo deste projeto é oferecer uma plataforma simples e eficiente para gerenciar notícias. Ele inclui funcionalidades como:
- Cadastro de notícias com título, corpo, autor e imagem.
- Exibição dinâmica das notícias publicadas.
- Estrutura modular para fácil expansão e manutenção.

O projeto foi desenvolvido em **novembro de 2024** por **Tiago Roglio**.

## 🛠️ Tecnologias Utilizadas

O sistema utiliza tecnologias modernas para garantir performance e escalabilidade:
- **PHP**: Para a lógica de back-end e manipulação de dados.
- **MySQL**: Banco de dados para armazenar as notícias.
- **HTML/CSS/JavaScript**: Front-end para interface com o usuário.
- **Bootstrap**: Para estilização responsiva.
- **jQuery**: Para interações dinâmicas no front-end.

## 📂 Estrutura do Projeto

A estrutura do projeto está organizada da seguinte forma:

- **public/**: Contém arquivos públicos, como imagens e assets.
- **src/**
  - **assets/**: Arquivos estáticos (imagens e estilos).
  - **classes/**: Classes PHP para lógica do sistema.
  - **db/**: Scripts para conexão e manipulação do banco de dados.
  - **inc/**: Componentes reutilizáveis, como headers e footers.
  - **php/**: Scripts de funcionalidades específicas.

## 🚀 Como Funciona

1. **Cadastro de Notícias**:
   - As notícias podem ser adicionadas através de um formulário, onde são especificados o título, corpo, autor e imagem.
   - As imagens são armazenadas no diretório `src/assets/uploads`.

2. **Exibição de Notícias**:
   - As notícias cadastradas são exibidas em uma página principal, com layout limpo e organizado.

3. **Banco de Dados**:
   - A tabela principal é `tbl_noticias`, com as seguintes colunas:
     - `id`: Identificador único da notícia.
     - `id_autor`: Identificador do autor.
     - `titulo`: Título da notícia.
     - `corpo_noticia`: Conteúdo da notícia.
     - `data_hora`: Data e hora da publicação.
     - `caminho_foto`: Caminho da imagem associada à notícia.

## 💡 Possíveis Melhorias

- Implementar autenticação de usuários para gerenciar permissões.
- Adicionar categorias para as notícias.
- Criar uma API para integração com outros sistemas.
- Melhorar o sistema de upload de imagens para suportar redimensionamento automático.

## 🧑‍💻 Autor

Desenvolvido por **Tiago Roglio** em novembro de 2024.

## 📧 Contato

Caso tenha dúvidas ou sugestões, entre em contato:
- **E-mail**: tiago.roglio2112@gmail.com

---

Obrigado por conferir este projeto! 😊