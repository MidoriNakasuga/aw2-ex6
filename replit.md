Mini Sistema Web PHP
Visão Geral
Sistema web educacional desenvolvido em PHP puro para revisar conceitos de autenticação, controle de acesso, sessões e filtros de dados. O projeto implementa um sistema completo de login com área restrita e listagem de produtos com filtro.

Data de criação: 22 de novembro de 2025

Estrutura do Projeto
/
├── login.php              # Página de autenticação
├── valida_login.php       # Processamento e validação de login
├── area_restrita.php      # Área restrita com listagem e filtros
├── logout.php             # Encerramento de sessão
└── replit.md             # Documentação do projeto

Funcionalidades
1. Sistema de Autenticação
Formulário de login com validação
Dois usuários configurados:
admin / 123456 (Administrador)
user / senha123 (Usuário Comum)
Mensagens de erro/sucesso
Validação server-side
2. Controle de Acesso
Sistema de sessões PHP
Redirecionamento automático se não autenticado
Mensagem: "Acesso negado. Faça login primeiro."
3. Área Restrita
Listagem de 15 produtos
Campos: ID, Nome, Categoria
6 categorias diferentes:
Eletrônicos
Periféricos
Áudio
Armazenamento
Escritório
Redes
4. Sistema de Filtros (método GET)
Filtro por nome do produto (busca parcial)
Filtro por categoria (seleção)
Contador de resultados
Botão para limpar filtros
Combinação de filtros permitida
5. Logout
Encerramento completo da sessão
Redirecionamento para login
Mensagem de confirmação
Arquitetura Técnica
Backend
Linguagem: PHP 8.2
Servidor: PHP Built-in Server
Porta: 5000
Sessões: PHP Session nativo
Frontend
HTML5 semântico
CSS3 com gradientes e animações
Design responsivo
Interface moderna e intuitiva
Segurança
Proteção XSS com htmlspecialchars()
Validação de sessão em todas as páginas restritas
Sanitização de inputs GET
Destruição completa de sessão no logout
Como Usar
Acessar o sistema: Abra o navegador e acesse a aplicação
Fazer login: Use as credenciais fornecidas na tela de login
Navegar na área restrita: Visualize e filtre os produtos
Aplicar filtros: Use a busca por nome ou selecione uma categoria
Sair: Clique no botão "Sair" para encerrar a sessão
Credenciais de Acesso
Usuário Administrador
Usuário: admin
Senha: 123456
Usuário Comum
Usuário: user
Senha: senha123
Tecnologias Utilizadas
PHP 8.2
HTML5
CSS3
Sessões PHP
GET Method para filtros
Preferências do Usuário
Comunicação em português brasileiro
Linguagem simples e direta
Interface intuitiva e moderna
Notas de Desenvolvimento
O servidor roda na porta 5000
Todos os dados são armazenados em arrays PHP (não utiliza banco de dados)
Sistema desenvolvido para fins educacionais
Workflow configurado para auto-inicialização do servidor
