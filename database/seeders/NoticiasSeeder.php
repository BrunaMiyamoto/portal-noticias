<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoticiasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("noticias")->insert([

            [

                "titulo" => "Inteligência Artificial Revoluciona o Desenvolvimento de Software em 2026",
                "resumo" => "Novas ferramentas de IA estão reduzindo o tempo de desenvolvimento e aumentando a produtividade de equipes de tecnologia em todo o mundo.",
                "conteudo" => "Empresas de tecnologia estão adotando plataformas de inteligência artificial capazes de gerar código, identificar falhas e automatizar testes. Especialistas apontam que essas ferramentas permitem que desenvolvedores concentrem seus esforços em tarefas mais estratégicas, reduzindo custos e acelerando a entrega de projetos.",
                "imagem" => "ia-desenvolvimento-2026.jpg",
                "categoria_id" => "1",
                "ativo" => "1",
                "usuario_id" => "1",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [

                "titulo" => "Computação Quântica Avança e Promete Transformar a Segurança Digital",
                "resumo" => "Pesquisadores anunciam novos avanços que podem impactar diretamente a criptografia e a proteção de dados.",
                "conteudo" => "Centros de pesquisa ao redor do mundo divulgaram resultados promissores em computação quântica. A nova geração de processadores quânticos apresenta maior estabilidade e capacidade de processamento, abrindo caminho para aplicações que vão desde a medicina até a segurança cibernética.",
                "imagem" => "computacao-quantica.jpg",
                "categoria_id" => "1",
                "ativo" => "1",
                "usuario_id" => "1",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [

                "titulo" => "Empresas Investem em Data Centers Sustentáveis para Reduzir Emissões",
                "resumo" => "A busca por eficiência energética impulsiona projetos de infraestrutura tecnológica mais ecológicos.",
                "conteudo" => "Grandes empresas do setor de tecnologia estão construindo data centers alimentados por fontes renováveis de energia. Além da redução no consumo elétrico, as novas instalações utilizam sistemas inteligentes de refrigeração que diminuem significativamente a emissão de carbono.",
                "imagem" => "datacenter-sustentavel.jpg",
                "categoria_id" => "2",
                "ativo" => "1",
                "usuario_id" => "1",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [

                "titulo" => "Nova Geração de Smartphones Utiliza Processadores com IA Integrada",
                "resumo" => "Fabricantes apostam em chips especializados para melhorar desempenho e recursos inteligentes.",
                "conteudo" => "Os novos smartphones lançados em 2026 contam com processadores que executam tarefas de inteligência artificial diretamente no dispositivo. Isso permite melhor reconhecimento de imagens, traduções em tempo real e otimização automática do consumo de bateria.",
                "imagem" => "smartphone-ia.jpg",
                "categoria_id" => "3",
                "ativo" => "1",
                "usuario_id" => "1",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [

                "titulo" => "Realidade Aumentada Ganha Espaço no Setor Educacional",
                "resumo" => "Escolas e universidades começam a adotar soluções de realidade aumentada para tornar o aprendizado mais interativo.",
                "conteudo" => "Instituições de ensino estão utilizando aplicativos de realidade aumentada para complementar aulas de ciências, história e engenharia. A tecnologia permite que alunos visualizem objetos tridimensionais e realizem simulações práticas sem a necessidade de laboratórios físicos complexos.",
                "imagem" => "realidade-aumentada-educacao.jpg",
                "categoria_id" => "4",
                "ativo" => "1",
                "usuario_id" => "1",
                "created_at" => now(),
                "updated_at" => now()
            ],

        ]);
    }
}
