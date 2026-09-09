🎪 Festival Experiência Viva

Sistema web desenvolvido para o Projeto-Teste do Festival Experiência Viva, com o objetivo de auxiliar na organização e gerenciamento das inscrições dos participantes nas atividades do evento.

O Festival Experiência Viva é um evento de três dias voltado para áreas como hospitalidade, gastronomia, beleza, bem-estar e inovação, contando com palestras, oficinas, demonstrações e experiências.

Este projeto foi desenvolvido seguindo os requisitos definidos no edital, priorizando organização, integridade dos dados e aplicação de boas práticas de desenvolvimento web.

📌 Sobre o Projeto

O sistema permite realizar o gerenciamento das principais informações relacionadas aos participantes, atividades e inscrições do festival.

A aplicação foi estruturada utilizando Programação Orientada a Objetos (POO), PDO para comunicação com o banco de dados e uma separação entre modelos, serviços e camada pública da aplicação.

Principais funcionalidades
👤 Cadastro de participantes
✏️ Atualização de participantes
🗑️ Exclusão de participantes
📋 Listagem de participantes
🎯 Cadastro de atividades
✏️ Atualização de atividades
🗑️ Exclusão de atividades respeitando as regras do sistema
📝 Inscrição de participantes em atividades
❌ Cancelamento de inscrições
🚫 Prevenção de inscrições duplicadas
👥 Controle de capacidade das atividades
🔐 Validação e integridade dos dados
🗄️ Persistência dos dados em banco de dados MySQL
🧩 Regras de Negócio

O sistema possui regras para garantir a consistência das inscrições e das atividades.

Participantes
Cada participante possui um identificador único.
O e-mail do participante deve ser único.
Um participante pode realizar inscrições em várias atividades.
A exclusão de um participante remove apenas suas respectivas inscrições.
Atividades
Cada atividade possui uma capacidade máxima de participantes.
Uma atividade que já possui inscrições não pode ser excluída.
As informações da atividade podem ser atualizadas conforme as regras definidas pelo sistema.
Inscrições
Um participante não pode possuir duas inscrições ativas para a mesma atividade.
A quantidade de inscrições ativas não pode ultrapassar a capacidade da atividade.
Uma inscrição pode ser cancelada.
O cancelamento de uma inscrição libera a vaga correspondente.
O relacionamento entre participante e atividade é controlado pelo banco de dados.
🛠️ Tecnologias Utilizadas
Backend
PHP
Programação Orientada a Objetos (POO)
PDO
MySQL
Frontend
HTML5
CSS3
JavaScript
Bootstrap
Ferramentas
Git
GitHub
XAMPP
Visual Studio Code
🏗️ Arquitetura do Projeto

O projeto utiliza uma organização baseada na separação de responsabilidades entre modelos, serviços, configuração e camada pública.

festival-experiencia-viva/
│
├── banco/
│   └── festival_experiencia_viva.sql
│
├── config/
│   └── config.php
│
├── models/
│   ├── Atividade.php
│   ├── Inscricao.php
│   └── Participantes.php
│
├── services/
│   ├── AtividadeService.php
│   ├── InscricaoService.php
│   └── ParticipanteService.php
│
├── public/
│   ├── index.php
│   ├── atividades.php
│   ├── inscricoes.php
│   ├── participantes.php
│   │
│   ├── css/
│   │   └── style.css
│   │
│   └── js/
│       └── scipt.js
│
├── testes/
│   ├── teste*.php
│   └── ...
│
└── README.md
🗄️ Banco de Dados

O sistema utiliza o banco de dados:

festival_experiencia_viva

A estrutura foi desenvolvida considerando integridade e normalização dos dados.

O relacionamento entre participantes, atividades e inscrições permite que:

PARTICIPANTES
      │
      │
      ▼
 INSCRIÇÕES
      │
      │
      ▼
 ATIVIDADES

A tabela de inscrições funciona como relacionamento entre participantes e atividades.

Entre as restrições utilizadas estão:

Chaves primárias
Chaves estrangeiras
Campos únicos
Controle de integridade referencial
Restrição de inscrições duplicadas
🔄 Fluxo Principal

O fluxo principal da aplicação pode ser representado da seguinte forma:

┌──────────────────────┐
│      Participante    │
└──────────┬───────────┘
           │
           ▼
┌──────────────────────┐
│ Visualiza atividades │
└──────────┬───────────┘
           │
           ▼
┌──────────────────────┐
│ Escolhe uma atividade│
└──────────┬───────────┘
           │
           ▼
┌──────────────────────┐
│ Verifica disponibilidade│
└──────────┬───────────┘
           │
      ┌────┴────┐
      │         │
    Vaga      Sem vaga
      │         │
      ▼         ▼
   Inscrição   Recusa
      │
      ▼
┌──────────────────────┐
│ Inscrição confirmada │
└──────────────────────┘
💻 Organização do Código
models/

Responsável pelas entidades e operações relacionadas aos dados do sistema.

Exemplos:

Atividade.php
Inscricao.php
Participantes.php
services/

Responsável pela implementação das regras de negócio.

AtividadeService.php
InscricaoService.php
ParticipanteService.php

Essa separação permite evitar que toda a lógica fique concentrada diretamente nas páginas públicas.

config/

Contém as configurações necessárias para conexão e utilização do banco de dados.

public/

Contém as páginas acessíveis pela aplicação e os arquivos responsáveis pela interface.

testes/

Contém arquivos utilizados para validar o funcionamento das funcionalidades implementadas.

▶️ Como Executar o Projeto
1. Pré-requisitos

Antes de executar o projeto, tenha instalado:

XAMPP
PHP
MySQL
Navegador web
2. Clonar o repositório
git clone https://github.com/Goulart21/festival-experiencia-viva.git
3. Colocar o projeto no XAMPP

Mova o projeto para:

C:\xampp\htdocs\

A estrutura deverá ficar semelhante a:

C:\xampp\htdocs\festival-experiencia-viva
4. Criar o banco de dados

Abra o phpMyAdmin e importe o arquivo:

banco/festival_experiencia_viva.sql

O banco utilizado pela aplicação será:

festival_experiencia_viva
5. Configurar a conexão

Verifique as configurações do arquivo:

config/config.php

Confirme os dados de conexão com o MySQL de acordo com o ambiente local.

6. Iniciar o XAMPP

Ative:

Apache
MySQL

Depois, acesse o projeto pelo navegador através do servidor local.

🧪 Testes

O projeto possui uma pasta específica para testes das funcionalidades:

testes/

Foram realizadas validações envolvendo operações como:

Cadastro de participantes
Atualização de participantes
Exclusão de participantes
Cadastro de atividades
Inscrição em atividades
Prevenção de inscrições duplicadas
Cancelamento de inscrições
Controle de vagas disponíveis
📚 Objetivo Acadêmico

O projeto foi desenvolvido como parte do Projeto-Teste do Festival Experiência Viva, tendo como foco a aplicação prática de conceitos de desenvolvimento web e engenharia de software.

Durante o desenvolvimento foram aplicados conceitos como:

Programação Orientada a Objetos
Arquitetura em camadas
Modelagem de banco de dados
Relacionamentos entre entidades
Integridade referencial
Operações CRUD
PDO e consultas parametrizadas
Regras de negócio
Controle de versão com Git
Desenvolvimento colaborativo utilizando GitHub
👨‍💻 Desenvolvedor

Pedro Teodoro Goulart Santana

Desenvolvimento Web • PHP • JavaScript • MySQL • POO

📄 Licença

Este projeto foi desenvolvido para fins acadêmicos, como parte do Projeto-Teste do Festival Experiência Viva.
