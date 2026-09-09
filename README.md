# 🎪 Festival Experiência Viva

<p align="center">
  <strong>Sistema Web para Gerenciamento de Participantes, Atividades e Inscrições</strong>
</p>

<p align="center">
  Projeto desenvolvido para o Projeto-Teste do <strong>Festival Experiência Viva</strong>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-8.x-777BB4?style=for-the-badge&logo=php&logoColor=white">
  <img src="https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql&logoColor=white">
  <img src="https://img.shields.io/badge/JavaScript-ES6-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black">
  <img src="https://img.shields.io/badge/Bootstrap-5-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white">
  <img src="https://img.shields.io/badge/Git-GitHub-F05032?style=for-the-badge&logo=git&logoColor=white">
</p>

---

## 📖 Sobre o Projeto

O **Festival Experiência Viva** é um sistema web desenvolvido para auxiliar na organização das atividades e inscrições de participantes do evento.

O festival possui duração de **três dias** e reúne experiências relacionadas a:

* 🍽️ Gastronomia
* 🏨 Hospitalidade
* 💆 Beleza
* 🧘 Bem-estar
* 💡 Inovação

O sistema foi desenvolvido seguindo os requisitos estabelecidos no **edital do Projeto-Teste**, utilizando uma estrutura baseada em **Programação Orientada a Objetos**, separação de responsabilidades e banco de dados relacional.

---

## ✨ Funcionalidades

### 👥 Participantes

* [x] Cadastro de participantes
* [x] Listagem de participantes
* [x] Atualização de dados
* [x] Exclusão de participantes
* [x] Validação de e-mail único
* [x] Controle de inscrições relacionadas

### 🎯 Atividades

* [x] Cadastro de atividades
* [x] Listagem de atividades
* [x] Atualização de atividades
* [x] Controle de capacidade
* [x] Validação das regras de negócio
* [x] Restrição de exclusão quando existem inscrições

### 📝 Inscrições

* [x] Inscrição em atividades
* [x] Controle de vagas disponíveis
* [x] Prevenção de inscrições duplicadas
* [x] Cancelamento de inscrição
* [x] Liberação de vaga após cancelamento
* [x] Integridade entre participantes, atividades e inscrições

---

## 🧠 Regras de Negócio

O sistema possui regras para garantir que os dados permaneçam consistentes durante a utilização.

| Regra           | Descrição                                                                  |
| --------------- | -------------------------------------------------------------------------- |
| 👤 Participante | Cada participante possui um identificador único                            |
| 📧 E-mail       | Não podem existir e-mails duplicados                                       |
| 🎯 Capacidade   | Uma atividade não pode ultrapassar sua capacidade máxima                   |
| 📝 Inscrição    | Um participante não pode possuir duas inscrições ativas na mesma atividade |
| ❌ Cancelamento  | O cancelamento libera a vaga da atividade                                  |
| 🗑️ Exclusão    | Atividades com inscrições não podem ser excluídas                          |
| 🔗 Integridade  | Relacionamentos são protegidos por chaves estrangeiras                     |

---

## 🛠️ Tecnologias

### Backend

<p>
  <img src="https://img.shields.io/badge/PHP-8.x-777BB4?style=flat-square&logo=php&logoColor=white">
  <img src="https://img.shields.io/badge/POO-Programação%20Orientada%20a%20Objetos-555555?style=flat-square">
  <img src="https://img.shields.io/badge/PDO-Database%20Access-777BB4?style=flat-square">
</p>

### Frontend

<p>
  <img src="https://img.shields.io/badge/HTML5-E34F26?style=flat-square&logo=html5&logoColor=white">
  <img src="https://img.shields.io/badge/CSS3-1572B6?style=flat-square&logo=css3&logoColor=white">
  <img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=flat-square&logo=javascript&logoColor=black">
  <img src="https://img.shields.io/badge/Bootstrap-7952B3?style=flat-square&logo=bootstrap&logoColor=white">
</p>

### Banco de Dados

<p>
  <img src="https://img.shields.io/badge/MySQL-4479A1?style=flat-square&logo=mysql&logoColor=white">
</p>

### Ferramentas

<p>
  <img src="https://img.shields.io/badge/Git-F05032?style=flat-square&logo=git&logoColor=white">
  <img src="https://img.shields.io/badge/GitHub-181717?style=flat-square&logo=github&logoColor=white">
  <img src="https://img.shields.io/badge/XAMPP-FB7A24?style=flat-square&logo=xampp&logoColor=white">
  <img src="https://img.shields.io/badge/VS%20Code-007ACC?style=flat-square&logo=visual-studio-code&logoColor=white">
</p>

---

## 🏗️ Arquitetura

O projeto utiliza uma estrutura organizada para separar responsabilidades entre **modelos, serviços, configuração e interface pública**.

```text
festival-experiencia-viva/
│
├── 📁 banco/
│   └── festival_experiencia_viva.sql
│
├── 📁 config/
│   └── config.php
│
├── 📁 models/
│   ├── Atividade.php
│   ├── Inscricao.php
│   └── Participantes.php
│
├── 📁 services/
│   ├── AtividadeService.php
│   ├── InscricaoService.php
│   └── ParticipanteService.php
│
├── 📁 public/
│   ├── index.php
│   ├── atividades.php
│   ├── inscricoes.php
│   ├── participantes.php
│   │
│   ├── 📁 css/
│   │   └── style.css
│   │
│   └── 📁 js/
│       └── scipt.js
│
├── 📁 testes/
│   └── arquivos de teste
│
└── README.md
```

---

## 🔄 Fluxo do Sistema

```text
                    ┌─────────────────┐
                    │   PARTICIPANTE  │
                    └────────┬────────┘
                             │
                             ▼
                    ┌─────────────────┐
                    │    ATIVIDADES   │
                    └────────┬────────┘
                             │
                             ▼
                    ┌─────────────────┐
                    │ VERIFICA VAGAS  │
                    └────────┬────────┘
                             │
                    ┌────────┴────────┐
                    ▼                 ▼
              ┌──────────┐      ┌──────────┐
              │  VAGA    │      │ SEM VAGA │
              │ DISPONÍVEL│     │          │
              └─────┬────┘      └──────────┘
                    │
                    ▼
              ┌──────────┐
              │ INSCRIÇÃO│
              │  ATIVA   │
              └─────┬────┘
                    │
                    ▼
              ┌──────────┐
              │CANCELAMENTO│
              └─────┬────┘
                    │
                    ▼
              ┌──────────┐
              │ VAGA     │
              │ LIBERADA │
              └──────────┘
```

---

## 🗄️ Banco de Dados

O banco utilizado pelo sistema é:

```text
festival_experiencia_viva
```

A estrutura utiliza relacionamentos entre as entidades:

```text
┌──────────────────┐
│   PARTICIPANTES  │
├──────────────────┤
│ id_participante  │
│ nome             │
│ email            │
│ telefone         │
└────────┬─────────┘
         │
         │ 1:N
         ▼
┌──────────────────┐
│    INSCRICOES    │
├──────────────────┤
│ id_inscricao     │
│ id_participante  │
│ id_atividade     │
│ status           │
└────────┬─────────┘
         │
         │ N:1
         ▼
┌──────────────────┐
│    ATIVIDADES    │
├──────────────────┤
│ id_atividade     │
│ nome_atividade   │
│ descricao        │
│ data_atividade   │
│ hora_inicio      │
│ hora_fim         │
│ local            │
│ capacidade       │
└──────────────────┘
```

### 🔐 Integridade

O banco utiliza recursos como:

* `PRIMARY KEY`
* `FOREIGN KEY`
* `UNIQUE`
* Restrições de integridade referencial
* Relacionamento entre entidades
* Controle de duplicidade

---

## 💻 Estrutura de Código

### `models/`

Representa as entidades utilizadas pelo sistema.

```text
Atividade.php
Inscricao.php
Participantes.php
```

### `services/`

Concentra as regras de negócio e operações do sistema.

```text
AtividadeService.php
InscricaoService.php
ParticipanteService.php
```

### `config/`

Centraliza a configuração da aplicação e conexão com o banco de dados utilizando **PDO**.

### `public/`

Contém as páginas utilizadas diretamente pela aplicação.

### `testes/`

Contém arquivos utilizados para validar o comportamento das funcionalidades.

---

## 🚀 Como Executar

### 1️⃣ Clone o repositório

```bash
git clone https://github.com/Goulart21/festival-experiencia-viva.git
```

### 2️⃣ Acesse a pasta

```bash
cd festival-experiencia-viva
```

### 3️⃣ Configure o XAMPP

Coloque o projeto dentro de:

```text
C:\xampp\htdocs\
```

Inicie no XAMPP:

```text
Apache
MySQL
```

### 4️⃣ Configure o banco

Abra o **phpMyAdmin** e importe:

```text
banco/festival_experiencia_viva.sql
```

### 5️⃣ Configure a conexão

Verifique as credenciais do banco em:

```text
config/config.php
```

### 6️⃣ Execute

Após iniciar o Apache e o MySQL, acesse o projeto através do servidor local.

---

## 🧪 Testes

As principais funcionalidades foram testadas durante o desenvolvimento, incluindo:

```text
✓ Cadastro de participante
✓ Atualização de participante
✓ Exclusão de participante
✓ Cadastro de atividade
✓ Atualização de atividade
✓ Inscrição em atividade
✓ Prevenção de inscrição duplicada
✓ Cancelamento de inscrição
✓ Controle de capacidade
✓ Liberação de vaga
✓ Integridade dos relacionamentos
```

---

## 📚 Conceitos Aplicados

Este projeto possibilitou a aplicação prática de conceitos importantes de desenvolvimento de software:

* 🧱 Programação Orientada a Objetos
* 🏛️ Separação de responsabilidades
* 🗃️ Modelagem de banco de dados
* 🔗 Relacionamentos entre entidades
* 🔐 Integridade referencial
* ♻️ Operações CRUD
* 🛡️ Consultas parametrizadas com PDO
* 📋 Regras de negócio
* 🧪 Testes funcionais
* 🌿 Git e GitHub
* 🔀 Branches e Pull Requests

---

## 🎓 Contexto Acadêmico

Projeto desenvolvido como parte do **Projeto-Teste do Festival Experiência Viva**, com foco no desenvolvimento de uma aplicação web para gerenciamento das inscrições dos participantes nas atividades do evento.

O desenvolvimento buscou aplicar conceitos de **desenvolvimento web, banco de dados, programação orientada a objetos e controle de versão**, seguindo os requisitos estabelecidos no edital.

---

## 👨‍💻 Desenvolvedor

<p align="center">
  <strong>Pedro Teodoro Goulart Santana</strong>
</p>

<p align="center">
  Desenvolvimento Web • PHP • JavaScript • MySQL • POO
</p>

<p align="center">
  <a href="https://github.com/Goulart21">
    <img src="https://img.shields.io/badge/GitHub-Goulart21-181717?style=for-the-badge&logo=github">
  </a>
</p>

---

<p align="center">
  ⭐ Se este projeto foi útil ou interessante, considere deixar uma estrela no repositório!
</p>
