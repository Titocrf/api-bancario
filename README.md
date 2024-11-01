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
  <li>Rode o comando para build:
    <pre class="command">make build</pre>
  </li>
  <li>Rode o comando para iniciar:
    <pre class="command">make up</pre>
  </li>
  <li>Rode o comando para parar:
    <pre class="command">make stop</pre>
  </li>
  <li>Rode o comando para resetar os dados:
    <pre class="command">make refresh</pre>
  </li>
  <li>Comando artisan de exemplo:
    <pre class="command">make artisan cmd="optimize:clear"</pre>
  </li>
</ol>

<h3>Teste unitário</h3>
<p>Para iniciar o teste, execute:</p>
<pre class="command">make test</pre>

<h2>Licença</h2>
<p>Este projeto foi feito por Thiago Dionisio.</p>

</body>
</html>
