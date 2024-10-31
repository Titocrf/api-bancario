<h1>Projeto de Transação Bancária</h1>

<p>Este é um projeto básico de transferência bancária utilizando Laravel. Ele inclui funcionalidades para login, registro de contas e transferências</p>

<h2>Requisitos</h2>
<ul>
  <li>Docker</li>
</ul>

<h2>Especificação</h2>
<ul>
  <li>PHP 8.1</li>
  <li>Laravel 10</li>
  <li>PostgreSQL 13</li>
</ul>

<h2>Instalação</h2>
<ol>
  <li>Copie o arquivo <code>.env.example</code> para <code>.env</code>:
    <pre class="command">cp .env.example .env</pre>
  </li>
  <li>Rode o comando para instalar os containers:
    <pre class="command">docker-compose up -d --build</pre>
  </li>
  <li>Rode as migrations:
    <pre class="command">docker exec -it laravel_app php artisan migrate --seed</pre>
  </li>
</ol>

<h3>Teste unitário</h3>
<p>Para iniciar o teste, execute:</p>
<pre class="command">docker exec -it laravel_app php artisan teste</pre>
<p>Lembrando que ao rodar o teste, limpará o banco de dados, sendo necessário rodar novamente:</p>
<pre class="command">docker exec -it laravel_app php artisan migrate:refresh --seed</pre>

<h2>Licença</h2>
<p>Este projeto foi feito por Thiago Dionisio, para um teste de emprego.</p>

</body>
</html>
