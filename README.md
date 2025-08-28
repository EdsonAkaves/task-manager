# Task Manager

Um sistema simples de gerenciamento de tarefas desenvolvido em PHP com MySQL, seguindo o padrão MVC (Model-View-Controller).

## 📋 Funcionalidades

- ✅ Criar novas tarefas
- ✅ Listar todas as tarefas
- ✅ Editar tarefas existentes
- ✅ Excluir tarefas
- ✅ Alterar status das tarefas (Pendente/Concluída)
- ✅ Interface web responsiva

## 🛠 Tecnologias Utilizadas

- **Backend:** PHP 7.4+
- **Banco de Dados:** MySQL
- **Frontend:** HTML5, CSS3
- **Arquitetura:** MVC (Model-View-Controller)

## 📁 Estrutura do Projeto

```
task-manager/
├── public/
│   ├── index.php              # Ponto de entrada da aplicação
│   └── assets/
│       └── style.css          # Estilos CSS
├── config/
│   └── database.php           # Configuração do banco de dados
├── src/
│   ├── controllers/
│   │   └── TaskController.php # Controlador principal
│   ├── models/
│   │   └── Task.php           # Modelo de dados
│   └── views/
│       ├── header.php         # Cabeçalho HTML
│       ├── footer.php         # Rodapé HTML
│       ├── task_list.php      # Listagem de tarefas
│       ├── task_create.php    # Formulário de criação
│       └── task_edit.php      # Formulário de edição
└── README.md
```

## 🚀 Como Executar

### Pré-requisitos

- PHP 7.4 ou superior
- MySQL 5.7 ou superior
- Servidor web (Apache/Nginx) ou PHP built-in server

### Instalação

1. **Clone o repositório:**
   ```bash
   git clone https://github.com/EdsonAkaves/task-manager
   cd task-manager
   ```

2. **Configurar o banco de dados:**
   ```sql
   CREATE DATABASE task_manager;
   USE task_manager;
   
   CREATE TABLE tasks (
       id INT AUTO_INCREMENT PRIMARY KEY,
       title VARCHAR(255) NOT NULL,
       description TEXT,
       status ENUM('pending', 'completed') DEFAULT 'pending',
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );
   ```

3. **Configurar conexão com banco:**
   Edite o arquivo `config/database.php` com suas credenciais:
   ```php
   $host = 'localhost';
   $dbname = 'task_manager';
   $user = 'seu_usuario';
   $password = 'sua_senha';
   ```

4. **Executar o projeto:**
   
   **Opção 1 - Servidor built-in do PHP:**
   ```bash
   cd public
   php -S localhost:8000
   ```
   
   **Opção 2 - Apache/Nginx:**
   Configure o document root para a pasta `public/`

5. **Acessar no navegador:**
   ```
   http://localhost:8000
   ```

## 📝 Como Usar

1. **Criar Tarefa:** Clique em "+ Criar tarefa" e preencha o formulário
2. **Listar Tarefas:** A página inicial mostra todas as tarefas cadastradas
3. **Editar Tarefa:** Clique em "Editar" na linha da tarefa desejada
4. **Excluir Tarefa:** Clique em "Excluir" e confirme a ação
5. **Alterar Status:** Use o formulário de edição para mudar entre "Pendente" e "Concluída"

## 🔒 Segurança

- Uso de Prepared Statements para prevenir SQL Injection
- Escape de dados com `htmlspecialchars()` para prevenir XSS
- Validação básica de dados de entrada

## 🤝 Contribuindo

1. Fork o projeto
2. Crie uma branch para sua feature (`git checkout -b feature/nova-feature`)
3. Commit suas mudanças (`git commit -am 'Adiciona nova feature'`)
4. Push para a branch (`git push origin feature/nova-feature`)
5. Abra um Pull Request

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

🚧 Status do Projeto

Este projeto ainda está em construção 🏗️
Novas funcionalidades e melhorias estão sendo implementadas continuamente.

## 📧 Contato

Desenvolvido por [Edson Alves] - [edson.akaves@gmail.com]

---

⭐ Se este projeto te ajudou, considere dar uma estrela no GitHub!
