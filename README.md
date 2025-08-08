# mysessions — Plugin para GLPI

## Visão geral

O **mysessions** é um plugin desenvolvido em PHP para GLPI, que implementa logout automático dos usuários após **15 minutos** de inatividade. Ele foi criado com foco em aumentar a segurança do sistema, encerrando sessões ociosas sem necessidade de alterar o core do GLPI ou configurar o PHP manualmente.

***

## Como foi feito

O plugin foi estruturado utilizando as práticas recomendadas para desenvolvimento de plugins em GLPI:

- **Arquivos principais:**
    - `hook.php`: Integra o plugin aos eventos do GLPI, cuidando do monitoramento de sessões.
    - `session_timeout.php`: Contém a lógica principal que verifica o tempo de inatividade e realiza o logout automático.
    - `setup.php`: Responsável pela instalação e inicialização do plugin no GLPI.
- **Funcionamento:**

1. O plugin monitora a sessão de cada usuário logado.
2. A cada requisição, verifica se houve 15 minutos de inatividade.
3. Caso positivo, encerra a sessão e redireciona para a tela de login.
4. Todo o processo ocorre sem alterações no core do GLPI.
- **Integração:**
    - Não há necessidade de configuração adicional.
    - Tempo de logout automático é fixo (15 minutos).
    - Código distribuído sob licença GPL v2.

***

## Instalação

1. Faça o download ou clone o repositório:

```bash
git clone https://github.com/ThiagoMarianols/mysessions.git
```

2. Copie a pasta `mysessions` para o diretório `plugins` da sua instalação GLPI.
3. No painel administrativo do GLPI, acesse **Configurar > Plugins**, localize "mysessions" e ative o plugin.
4. Pronto! O logout automático estará funcionando.

***

## Características principais

- Logout automático após 15 minutos de inatividade.
- Desenvolvido totalmente em PHP.
- Integração fácil e sem modificar o core do GLPI.
- Foco em segurança, com funcionamento transparente para o usuário.
- Instalação e remoção simples.

***

## Release inicial

Primeira versão do plugin que realiza logout automático após 15 minutos de inatividade no GLPI. Solução simples e integrada para aumentar a segurança, encerrando sessões ociosas de forma automática.

***

## Créditos

Desenvolvido por [ThiagoMarianols](https://github.com/ThiagoMarianols)

[LinkedIn: tmls](https://www.linkedin.com/in/tmls/)


