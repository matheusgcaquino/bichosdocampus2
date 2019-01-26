# BICHOS DO CAMPUS

PROJETO DA DISCIPLINA DE PRÁTICAS I 
INTEGRANTES: 
   - EIKE SOUSA
   - JOÃO MANOEL
   - JOSÉ ROBSON
   - LUCAS BRABEC
   - MATHEUS AQUINO
 
## 1) Erros Comuns

### Problema 01: Composer Desatualizado

![alt text](https://i.imgur.com/rJ36tVE.png)

Caso você faça um git clone, alguns arquivos não serão baixados. Por isso é necessario fazer um update de alguns arquivos. Um deles é o composer. Para atualizar basta digitar no terminal o comando "composer update"

![alt text](https://i.imgur.com/rJ36tVE.png)

E pronto, o composer já esta atualizado.

### Problema 02: .env Não Existe

![alt text](https://i.imgur.com/rJ36tVE.png)

Caso você faça um git clone, alguns arquivos não serão baixados. Por isso é necessario fazer um update de alguns arquivos. Um deles é o ".env". Para consertar este problema, basta você duplicar o arquivo ".env.example." Renomear o arquivo duplicado para ".env".
Pois é necessario existir um arquivo ".env" no projeto.

Logo após é necessario gerar uma key no ".env". Para gerar essa chave basta abrir o terminal e digitar o comando "php artisan key:generate".

![alt text](https://i.imgur.com/rJ36tVE.png)

E pronto, a key já foi gerada.

