Aplicação utilizando Laravel MySql, prove um sistema de Login e nível de acesso simples. O administrador do sistema deverá Manter permissões e Manter usuários, cada usuário com uma ou mais permissões para a execução das seguintes tarefas:

run:
php artisan migrate --seed

Administrador - http://localhost:8000/admin/user 
login: admin@factory.com 
senha:password

Comum - http://localhost:8000/comum/login
login: user@factory.com
senha:password

Manter produtos - http://localhost:8000/comum/produto
Manter categorias - http://localhost:8000/comum/categoria
Manter marcas - http://localhost:8000/comum/marca

Fiz um teste a termo de treinar, usei o seed para criar o primeiro usuario (condicao primeiro usuario precisa ter permissao apenas para produto)

run: php artisan test


