# Vida|Saúde Demo

> Plataforma demonstrativa para gestão assistencial, atendimento, triagem, fila de pacientes e prontuário eletrônico, desenvolvida com Laravel.

## Sobre o projeto

O **Vida|Saúde** é um projeto demonstrativo voltado à modernização da gestão em saúde, integrando informações assistenciais e operacionais em uma única aplicação.

A proposta é demonstrar uma experiência de atendimento mais conectada, organizada e segura, permitindo acompanhar o fluxo do paciente desde o atendimento e a triagem até o prontuário eletrônico.

Este repositório contém a versão **Demo** do projeto, utilizada para desenvolvimento, testes e apresentação da solução.

## Funcionalidades

### Autenticação

* Login de usuário
* Logout
* Recuperação de senha
* Redefinição de senha
* Interface de acesso personalizada

### Gestão de pacientes

* Cadastro de pacientes
* Listagem de pacientes
* Visualização das informações do paciente
* Integração com a camada de domínio de pacientes

### Atendimento

* Registro de atendimentos
* Controle do status do atendimento
* Geração e utilização de senha de atendimento
* Controle de prioridade
* Observações do atendimento

### Triagem

* Controle da fila de pacientes aguardando triagem
* Registro das informações de triagem
* Organização do fluxo assistencial

### Fila de atendimento

A aplicação possui um painel de fila destinado ao controle e chamada dos pacientes.

A apresentação pública da chamada foi pensada para preservar informações do paciente, exibindo apenas os dados necessários para identificação no momento da chamada, como:

* Senha
* Primeiro nome
* Sala ou consultório

O painel não exibe informações clínicas ou especialidades médicas ao público.

### Prontuário eletrônico

* Consulta do prontuário
* Registro clínico
* Visualização do histórico assistencial
* Registro de diagnóstico
* Estrutura preparada para evolução do projeto

### Integração e-SUS

O projeto também possui materiais e estruturas relacionados à integração com o **e-SUS APS**, incluindo:

* XSD
* XML
* Thrift
* Estruturas geradas para os formatos de atendimento e cadastro

Os arquivos estão organizados em:

```text
resources/esus/
```

e

```text
app/Support/Esus/
```

## Tecnologias

* **PHP**
* **Laravel**
* **Blade**
* **Vite**
* **JavaScript**
* **CSS**
* **Eloquent ORM**
* **Git / GitHub**

## Estrutura do projeto

```text
app/
├── Domain/
├── Http/
├── Models/
├── Providers/
└── Support/

database/
├── factories/
├── migrations/
└── seeders/

resources/
├── css/
├── js/
├── esus/
└── views/

routes/
└── web.php

public/
└── index.php
```

## Principais módulos

```text
Login
  ↓
Dashboard
  ↓
Pacientes
  ↓
Atendimento
  ↓
Triagem
  ↓
Fila
  ↓
Prontuário
  ↓
Registro Clínico
```

## Requisitos

Para executar o projeto localmente, tenha instalado:

* PHP
* Composer
* Node.js e npm
* Banco de dados compatível com a configuração do projeto
* Git

## Instalação

Clone o repositório:

```bash
git clone https://github.com/danielaleao83-glitch/vidasaudedemo.git
```

Entre na pasta:

```bash
cd vidasaudedemo
```

Instale as dependências PHP:

```bash
composer install
```

Instale as dependências JavaScript:

```bash
npm install
```

Crie o arquivo de ambiente:

```bash
cp .env.example .env
```

No Windows PowerShell, pode ser utilizado:

```powershell
Copy-Item .env.example .env
```

Gere a chave da aplicação:

```bash
php artisan key:generate
```

Configure no arquivo `.env` os parâmetros do banco de dados.

Execute as migrations:

```bash
php artisan migrate
```

Execute o frontend em desenvolvimento:

```bash
npm run dev
```

Em outro terminal, inicie o servidor Laravel:

```bash
php artisan serve
```

A aplicação estará disponível em:

```text
http://127.0.0.1:8000
```

## Build de produção

Para gerar os arquivos de frontend:

```bash
npm run build
```

## Banco de dados

As migrations do projeto contemplam, entre outras estruturas:

* Usuários
* Pacientes
* Atendimentos
* Triagens
* Registros clínicos
* Cache
* Jobs

As migrations estão localizadas em:

```text
database/migrations/
```

## Segurança

Informações sensíveis de ambiente não são versionadas no Git.

O arquivo:

```text
.env
```

está protegido pelo `.gitignore`.

O repositório disponibiliza:

```text
.env.example
```

como modelo de configuração.

Para uma implantação real, devem ser adotadas configurações adicionais de segurança, autenticação, autorização, proteção de dados, infraestrutura e armazenamento.

## Status do projeto

**Vida|Saúde Demo — em desenvolvimento**

Esta versão tem finalidade demonstrativa e serve como base para evolução das funcionalidades assistenciais, integrações e componentes da plataforma.

## Objetivos futuros

Entre as possibilidades de evolução estão:

* Aperfeiçoamento do prontuário eletrônico
* Ampliação da integração com e-SUS APS
* Controle de perfis e permissões
* Auditoria de operações
* Melhorias no fluxo assistencial
* Painéis gerenciais
* Notificações e comunicação em tempo real
* Integrações com outros sistemas de saúde

## Autoria

**Vida|Saúde**

Projeto desenvolvido para demonstração de uma plataforma integrada de gestão e atendimento em saúde.

## Licença

Este projeto é disponibilizado para fins demonstrativos e de desenvolvimento.

---

### Vida|Saúde

**Tecnologia em saúde**

Inteligência para uma saúde mais conectada.
