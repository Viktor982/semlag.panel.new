<?php

require __DIR__.'/../../bootstrap/app.php';

use NPDashboard\ACL\Models\Role;

$roles = [
    [
        'role' => 'payments_sales_list',
        'description' => 'Listar vendas',
        'group' => '1'
    ],
    [
        'role' => 'payments_sales_edit',
        'description' => 'Editar vendas',
        'group' => '1'
    ],
    [
        'role' => 'payments_sales_quote',
        'description' => 'Adicionar e ler anotações sobre vendas',
        'group' => '1'
    ],
    [
        'role' => 'payments_sales_reversal',
        'description' => 'Devolver o Pagamento de uma venda',
        'group' => '1'
    ],
    [
        'role' => 'payments_subscriptions_list',
        'description' => 'Listar subscriptions',
        'group' => '1'
    ],
    [
        'role' => 'payments_subscriptions_edit',
        'description' => 'Editar subscriptions',
        'group' => '1'
    ],
    [
        'role' => 'payments_subscriptions_quotes',
        'description' => 'Adicionar e ler anotações sobre subscriptions',
        'group' => '1'
    ],
    [
        'role' => 'payments_coupons_list',
        'description' => 'Listar Cupons',
        'group' => '1'
    ],
    [
        'role' => 'payments_coupons_edit',
        'description' => 'Editar Cupons(Ativar ou Desativar)',
        'group' => '1'
    ],
    [
        'role' => 'payments_coupons_create',
        'description' => 'Criar Cupons',
        'group' => '1'
    ],
    [
        'role' => 'payments_coupons_quotes',
        'description' => 'Adicionar e ler anotações sobre cupons',
        'group' => '1'
    ],
    [
        'role' => 'payments_ipn_logs',
        'description' => 'Visualizar logs de IPN',
        'group' => '1'
    ],
    [
        'role' => 'payments_gateways_list',
        'description' => 'Visualizar Gateways',
        'group' => '1'
    ],
    [
        'role' => 'payments_gateways_edit',
        'description' => 'Editar Gateways',
        'group' => '1'
    ],
    [
        'role' => 'payments_discounts_list',
        'description' => 'Listar cupons de desconto',
        'group' => '1'
    ],
    [
        'role' => 'payments_discounts_edit',
        'description' => 'Editar cupons de desconto',
        'group' => '1'
    ],
    [
        'role' => 'payments_discounts_create',
        'description' => 'Criar cupons de desconto',
        'group' => '1'
    ],
    [
        'role' => 'payments_withdrawals_list',
        'description' => 'Listar pedidos de saque',
        'group' => '1'
    ],
    [
        'role' => 'payments_withdrawals_edit',
        'description' => 'Editar pedidos de saque',
        'group' => '1'
    ],
    [
        'role' => 'affiliates_list',
        'description' => 'Listar Afiliados',
        'group' => '2'
    ],
    [
        'role' => 'affiliates_sales',
        'description' => 'Visualizar relatório de vendas de afiliados',
        'group' => '2'
    ],
    [
        'role' => 'customers_list',
        'description' => 'Listar clientes',
        'group' => '3'

    ],
    [
        'role' => 'customers_edit',
        'description' => 'Editar clientes',
        'group' => '3'
    ],
    [
        'role' => 'customers_create',
        'description' => 'Criar clientes',
        'group' => '3'
    ],
    [
        'role' => 'customers_contact',
        'description' => 'Permitir contato via e-mail com cliente',
        'group' => '3'
    ],
    [
        'role' => 'customers_coupons',
        'description' => 'Listar cupons dos clientes',
        'group' => '3'

    ],
    [
        'role' => 'customers_rulegroups',
        'description' => 'Visualizar rulegroups de clientes',
        'group' => '3'

    ],
    [
        'role' => 'customers_auth_login',
        'description' => 'Realizar login com credenciais de clientes',
        'group' => '3'
    ],
    [
        'role' => 'resellers_list',
        'description' => 'Listar revendedores',
        'group' => '4'
    ],
    [
        'role' => 'resellers_details',
        'description' => 'Visualizar detalhes de revendedores',
        'group' => '4'
    ],
    [
        'role' => 'resellers_assign',
        'description' => 'Editar nível de revendedor de clientes',
        'group' => '4'
    ],
    [
        'role' => 'testimonials_list',
        'description' => 'Listar depoimentos',
        'group' => '5'
    ],
    [
        'role' => 'testimonials_edit',
        'description' => 'Editar depoimentos',
        'group' => '5'

    ],
    [
        'role' => 'testimonials_fake_list',
        'description' => 'Listar depoimentos Fakes',
        'group' => '5'

    ],
    [
        'role' => 'testimonials_fake_create',
        'description' => 'Criar depoimentos Fakes',
        'group' => '5'

    ],
    [
        'role' => 'testimonials_fake_edit',
        'description' => 'Editar depoimentos Fakes',
        'group' => '5'

    ],
    [
        'role' => 'testimonials_fake_schedule',
        'description' => 'Acessar Schedule dos depoimentos Fakes',
        'group' => '5'

    ],
    [
        'role' => 'site_download_links_list',
        'description' => 'Listar links de downloads',
        'group' => '6'
    ],
    [
        'role' => 'site_faqs_list',
        'description' => 'Visualizar as FAQs do Site',
        'group' => '6'
    ],
    [
        'role' => 'site_faqs_create',
        'description' => 'Criar uma FAQ no Site.',
        'group' => '6'
    ],
    [
        'role' => 'site_faqs_edit',
        'description' => 'Editar uma FAQ no site.',
        'group' => '6'
    ],
    [
        'role' => 'site_languages_list',
        'description' => 'Visualizar as Traduções do site',
        'group' => '6'
    ],
    [
        'role' => 'site_languages_read',
        'description' => 'Ler os Arquivos de Tradução do site',
        'group' => '6'
    ],
    [
        'role' => 'site_cache',
        'description' => 'Permite o usuário ter acesso a tela de cache',
        'group' => '6'
    ],
    [
        'role' => 'site_cache_update',
        'description' => 'Permite Fazer a Limpeza do cache.',
        'group' => '6'
    ],
    [
        'role' => 'site_maintence',
        'description' => 'Permite acessar a tela de Manutenção do site',
        'group' => '6'
    ],
    [
        'role' => 'site_maintence_update',
        'description' => 'Permite Colocar o Site em manutenção ou tirar.',
        'group' => '6'
    ],
    [
        'role' => 'site_download_links_create',
        'description' => 'Criar um link de downloads',
        'group' => '6'
    ],
    [
        'role' => 'site_download_links_edit',
        'description' => 'Editar links de downloads',
        'group' => '6'

    ],
    [
        'role' => 'site_slides_list',
        'description' => 'Listar slideshows',
        'group' => '6'
    ],
    [
        'role' => 'site_slides_create',
        'description' => 'Criar slideshows',
        'group' => '6'
    ],
    [
        'role' => 'site_slides_edit',
        'description' => 'Editar slideshows',
        'group' => '6'

    ],
    [
        'role' => 'site_games_list',
        'description' => 'Listar jogos suportados',
        'group' => '6'
    ],
    [
        'role' => 'site_game_create',
        'description' => 'Criar jogos suportados',
        'group' => '6'
    ],
    [
        'role' => 'site_games_edit',
        'description' => 'Editar jogos suportados',
        'group' => '6'
    ],
    [
        'role' => 'site_blog_posts_list',
        'description' => 'Listar posts do blog',
        'group' => '6'
    ],
    [
        'role' => 'site_blog_posts_create',
        'description' => 'Criar posts pro blog',
        'group' => '6'
    ],
    [
        'role' => 'site_blog_posts_edit',
        'description' => 'Editar posts do blog',
        'group' => '6'
    ],
    [
        'role' => 'site_blog_posts_approved',
        'description' => 'Poder Aprovar Posts ou Postar com a Permissão de Aprovados',
        'group' => '6'
    ],
    [
        'role' => 'site_blog_posts_delete',
        'description' => 'Deletar Postagens do Blog',
        'group' => '6'
    ],
    [
        'role' => 'site_blog_comments_list',
        'description' => 'Listar comentarios do blog',
        'group' => '6'
    ],
    [
        'role' => 'site_blog_comments_approved',
        'description' => 'Aprovar comentarios do blog',
        'group' => '6'
    ],
    [
        'role' => 'site_blog_categories_list',
        'description' => 'Listar categorias do blog',
        'group' => '6'
    ],
    [
        'role' => 'site_blog_tags_list',
        'description' => 'Listar Tags do Blog',
        'group' => '6'
    ],
    [
        'role' => 'site_blog_tags_list',
        'description' => 'Listar Tags do Blog',
        'group' => '6'
    ],
    [
        'role' => 'plans_list',
        'description' => 'Listar planos',
        'group' => '7'
    ],
    [
        'role' => 'plans_create',
        'description' => 'Criar planos',
        'group' => '7'
    ],
    [
        'role' => 'plans_edit',
        'description' => 'Editar planos',
        'group' => '7'
    ],
    [
        'role' => 'infrastructure',
        'description' => 'Adicionar e remover servidores, aliases, rotas etc..',
        'group' => '8'
    ],
    [
        'role' => 'administrative',
        'description' => 'Controlar planos, usuarios e etc',
        'group' => '9'
    ],
    [
        'role' => 'monitoring_list',
        'description' => 'Listar Monitoramento',
        'group' => '9'
    ]
];

$createdRules = [];

foreach ($roles as $role) {
    $createdRules[] = Role::create($role);
}

$createdRules = collect($createdRules);

