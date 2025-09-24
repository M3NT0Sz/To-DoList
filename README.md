# 📝 To-Do List

Uma aplicação web moderna de gerenciamento de tarefas construída com Laravel 12, oferecendo uma interface intuitiva para organizar e controlar suas atividades diárias.

## 🚀 Características

- ✅ **Gerenciamento Completo de Tarefas**: Criar, editar, visualizar e excluir tarefas
- 👥 **Sistema de Autenticação**: Login seguro com Laravel Fortify
- 🎯 **Níveis de Prioridade**: Organize tarefas por prioridade (baixa, média, alta)
- 📅 **Prazos**: Defina datas de vencimento para suas tarefas
- ✔️ **Status de Conclusão**: Marque tarefas como pendentes ou concluídas
- 📱 **Interface Responsiva**: Design moderno com AdminLTE 4 e Bootstrap 5
- 🔒 **Segurança**: Cada usuário acessa apenas suas próprias tarefas

## 🛠️ Tecnologias Utilizadas

### Backend
- **Laravel 12** - Framework PHP moderno
- **Laravel Fortify** - Autenticação robusta
- **MySQL** - Banco de dados relacional
- **PHP 8.2+** - Linguagem de programação

### Frontend
- **AdminLTE 4** - Template de interface administrativa
- **Bootstrap 5** - Framework CSS
- **Bootstrap Icons** - Ícones vetoriais
- **Chart.js** - Gráficos e visualizações
- **Vite** - Build tool moderno
- **Sass** - Pré-processador CSS

### Testes
- **Pest PHP** - Framework de testes moderno
- **Laravel Pint** - Code style fixer

## 📋 Pré-requisitos

Certifique-se de ter instalado:

- PHP >= 8.2
- Composer
- Node.js >= 18
- NPM ou Yarn
- MySQL >= 8.0
- Git

## ⚡ Instalação Rápida

### 1. Clone o repositório
```bash
git clone https://github.com/M3NT0Sz/To-DoList.git
cd to-dolist
```

### 2. Instale as dependências do PHP
```bash
composer install
```

### 3. Instale as dependências do Node.js
```bash
npm install
```

### 4. Configure o ambiente
```bash
# Copie o arquivo de configuração
copy .env.example .env

# Gere a chave da aplicação
php artisan key:generate
```

### 5. Configure o banco de dados
Edite o arquivo `.env` e configure as credenciais do MySQL:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=todolist
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

### 6. Execute as migrações
```bash
php artisan migrate
```

### 7. Compile os assets
```bash
npm run build
```

### 8. Inicie o servidor
```bash
php artisan serve
```

Acesse a aplicação em: `http://localhost:8000`

## 🏃‍♂️ Execução em Desenvolvimento

Para desenvolvimento com hot reload:

```bash
# Terminal 1 - Servidor Laravel
php artisan serve

# Terminal 2 - Build dos assets com watch
npm run dev

# Terminal 3 - Queue worker (se necessário)
php artisan queue:work
```

Ou use o comando simplificado:
```bash
composer run dev
```

## 📊 Estrutura do Banco de Dados

### Tabela: `tasks`
| Campo | Tipo | Descrição |
|-------|------|-----------|
| id | bigint | ID único da tarefa |
| title | string | Título da tarefa |
| description | text | Descrição detalhada (opcional) |
| priority | enum | Prioridade (low, medium, high) |
| due_date | date | Data de vencimento (opcional) |
| completed | enum | Status (pending, completed) |
| user_id | bigint | ID do usuário proprietário |
| created_at | timestamp | Data de criação |
| updated_at | timestamp | Data de atualização |

## 🔄 Funcionalidades Principais

### 📝 Gestão de Tarefas
- **Criar Tarefa**: Formulário completo com título, descrição, prioridade e prazo
- **Listar Tarefas**: Visualização paginada de todas as tarefas do usuário
- **Editar Tarefa**: Modificação de dados existentes
- **Excluir Tarefa**: Remoção definitiva de tarefas
- **Filtros**: Organização por status e prioridade

### 🔐 Sistema de Autenticação
- **Registro de Usuário**: Criação de nova conta
- **Login/Logout**: Autenticação segura
- **Proteção de Rotas**: Acesso restrito a usuários autenticados
- **Sessões Seguras**: Gerenciamento automático de sessões

## 📁 Estrutura de Arquivos

```
to-dolist/
├── app/
│   ├── Http/Controllers/
│   │   └── TaskController.php      # Controlador de tarefas
│   ├── Models/
│   │   ├── Task.php               # Model da tarefa
│   │   └── User.php               # Model do usuário
│   └── Actions/Fortify/           # Ações de autenticação
├── database/
│   ├── migrations/                # Migrações do banco
│   └── factories/                 # Factories para testes
├── resources/
│   ├── views/                     # Templates Blade
│   ├── js/                        # Arquivos JavaScript
│   └── scss/                      # Arquivos de estilo
├── routes/
│   └── web.php                    # Definição de rotas
└── tests/                         # Testes automatizados
```

## 🧪 Executando Testes

```bash
# Executar todos os testes
./vendor/bin/pest

# Executar testes com coverage
./vendor/bin/pest --coverage

# Executar testes específicos
./vendor/bin/pest tests/Feature/TaskTest.php
```

## 🎨 Personalização

### Modificar Estilos
```bash
# Edite os arquivos SCSS em resources/scss/
npm run dev    # Para desenvolvimento
npm run build  # Para produção
```

### Adicionar Novas Funcionalidades
1. Crie uma nova migração: `php artisan make:migration`
2. Crie um novo controller: `php artisan make:controller`
3. Adicione rotas em `routes/web.php`
4. Crie views em `resources/views/`

## 🔧 Comandos Úteis

```bash
# Limpar cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Executar migrações
php artisan migrate
php artisan migrate:rollback

# Gerar dados de teste
php artisan db:seed

# Verificar rotas
php artisan route:list

# Análise de código
./vendor/bin/pint
```

## 📈 Performance

### Otimizações Incluídas
- **Paginação**: Listas de tarefas paginadas
- **Cache de Configuração**: Cache automático em produção
- **Otimização de Assets**: Minificação e compressão
- **Lazy Loading**: Carregamento eficiente de dados

### Recomendações para Produção
```bash
# Otimizar autoloader
composer install --optimize-autoloader --no-dev

# Cache de configuração
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Build de produção
npm run build
```

## 🚀 Deploy

### Preparação para Produção
1. Configure variáveis de ambiente de produção
2. Execute otimizações de cache
3. Configure servidor web (Apache/Nginx)
4. Configure SSL/HTTPS
5. Configure backups automáticos

## 🤝 Contribuição

1. Faça um fork do projeto
2. Crie uma branch para sua feature: `git checkout -b feature/nova-funcionalidade`
3. Commit suas mudanças: `git commit -am 'Adiciona nova funcionalidade'`
4. Push para a branch: `git push origin feature/nova-funcionalidade`
5. Abra um Pull Request

## 📝 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

## 👨‍💻 Autor

**M3NT0Sz**
- GitHub: [@M3NT0Sz](https://github.com/M3NT0Sz)
- Projeto: [To-DoList](https://github.com/M3NT0Sz/To-DoList)

## 🆘 Suporte

Encontrou um problema? Tem uma sugestão?
- Abra uma [Issue](https://github.com/M3NT0Sz/To-DoList/issues)
- Entre em contato através do GitHub

---

⭐ **Gostou do projeto? Deixe uma estrela no GitHub!** ⭐
