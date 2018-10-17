create database bancoSistema;
select * from curso;
create table renda(
    id integer primary key auto_increment,
    valor varchar(30)
);
select * from aluno_curso;

select aluno_turma.aluno_id, 
                aluno.nome, aluno_turma.semestre_id, 
                aluno_turma.disciplina_id, aluno_curso.matricula from aluno_curso 
                join aluno on aluno.id=aluno_curso.aluno_id 
                join aluno_turma on aluno.id=aluno_turma.aluno_id 
                join disciplina on aluno_turma.disciplina_id=disciplina.id 
                where aluno_turma.disciplina_id =51  and aluno_turma.semestre_id=1 and aluno_curso.matricula = 201801444;


select * from curso;
select * from disciplina;

select aluno_curso.matricula, aluno_curso.aluno_id, aluno_turma.aluno_id from aluno_curso join aluno_turma
                    on aluno_curso.aluno_id=aluno_turma.aluno_id where (select aluno_turma.aluno_id, 
  aluno.nome, aluno_turma.semestre_id, 
 aluno_turma.disciplina_id, aluno_curso.matricula from aluno_curso 
join aluno on aluno.id=aluno_curso.aluno_id 
                join aluno_turma on aluno.id=aluno_turma.aluno_id 
             join disciplina on aluno_turma.disciplina_id=disciplina.id;
           
select aluno_curso.matricula, aluno_curso.aluno_id, aluno_turma.aluno_id from aluno_curso join aluno_turma
                    on aluno_curso.aluno_id=aluno_turma.aluno_id;

select aluno_curso.matricula, aluno_curso.aluno_id, aluno_turma.aluno_id from aluno_curso join aluno_turma
                    on aluno_curso.aluno_id=aluno_turma.aluno_id;


select aluno.nome from aluno join aluno_turma
                    on aluno.id=aluno_turma.aluno_id where aluno_turma.disciplina_id=51;
select aluno.nome from aluno join aluno_turma"
                    . "on aluno.id=aluno_turma.aluno_id where aluno_turma.disciplina_id=$disciplina_id;

select * from aluno_turma where (aluno_id = 6 and disciplina_id = 50) and semestre_id = 1;

insert into aluno_turma (aluno_id, disciplina_id, semestre_id) values ();
select * from aluno_turma;

select aluno_curso.matricula, aluno_curso.aluno_id, aluno_turma.aluno_id from aluno_curso join aluno_turma
                    on aluno_curso.aluno_id=aluno_turma.aluno_id;

select aluno_turma.aluno_id, 
                aluno.nome, aluno_turma.semestre_id, 
                aluno_turma.disciplina_id, aluno_curso.matricula from aluno_curso 
                join aluno on aluno.id=aluno_curso.aluno_id 
                join aluno_turma on aluno.id=aluno_turma.aluno_id 
                join disciplina on aluno_turma.disciplina_id=disciplina.id
                where aluno_turma.semestre_id=1 and aluno_turma.disciplina_id = 50;

select * from aluno_turma;

select id, nome from disciplina;
select aluno_curso.matricula, aluno_curso.aluno_id, aluno_turma.aluno_id from aluno_curso join aluno_turma
                    on aluno_curso.aluno_id=aluno_turma.aluno_id;

select aluno_curso.matricula, aluno_curso.aluno_id, aluno_turma.aluno_id from aluno_curso join aluno_turma
                    on aluno_curso.aluno_id=aluno_turma.aluno_id;

select aluno.nome from aluno join aluno_turma
                    on aluno.id=aluno_turma.aluno_id where aluno_turma.disciplina_id=46;
select * from aluno;
select nome, id from aluno;

select nome from disciplina join aluno_turma on aluno_turma.disciplina_id=disciplina.id where aluno_turma.aluno_id = 14;

select nome from disciplina join aluno_turma on aluno_turma.disciplina_id=disciplina.id where aluno_turma.aluno_id = 11;
select * from disciplina;

select disciplina.nome from curso join disciplina on disciplina.curso_id=curso.id 
                        join aluno on aluno.id=aluno_curso.aluno_id
                        join aluno_curso on aluno_curso.curso_id=curso.id;
                        join aluno_curso on aluno_curso.aluno_id=aluno.id 
                        join aluno_turma on aluno_turma.aluno_id=aluno_curso.aluno_id; 
                        
                        
                         where aluno_curso.aluno_id = 14;
select disciplina.nome from aluno join aluno_curso on aluno.id=aluno_curso.aluno_id
                        join curso on curso.id=aluno_curso.curso_id
                        join disciplina on disciplina.curso_id=curso.id
                         where aluno_curso.aluno_id = 14;

select disciplina.nome from curso join disciplina on disciplina.curso_id=curso.id
join aluno_curso on aluno_curso.curso_id=curso.id where aluno_curso.aluno_id=;

select disciplina.nome from disciplina join curso on disciplina.curso_id=curso.id
join aluno_turma on aluno_turma.disciplina_id=disciplina.id
where aluno_turma.aluno_id=14;

SELECT  * FROM ALUNO_TURMA;
select id, nome from disciplina;
select aluno.nome from aluno join aluno_turma
                     on aluno.id=aluno_turma.aluno_id where aluno_turma.disciplina_id=47;

select * from aluno;

select disciplina.nome from aluno join aluno_curso on aluno_curso.aluno_id=aluno.id
                        join aluno_turma on aluno_turma.aluno_id=aluno_curso.aluno_id where aluno_curso.aluno_id = 14;

select * from DISCIPLINA;

SELECT disciplina.nome from ALUNO JOIN ALUNO_CURSO
                        ON ALUNO.ID=ALUNO_CURSO.ALUNO_ID
                        JOIN DISCIPLINA
                        ON DISCIPLINA.=CURSO.ID
                        JOIN CURSO
                        ON DISCIPLINA.curso_id=CURSO.id WHERE ALUNO_CURSO.aluno_id=14;

SELECT DISCIPLINA.nome FROM DISCIPLINA JOIN CURSO
                        ON DISCIPLINA.curso_id=CURSO.id
                        JOIN ALUNO_CURSO ON ALUNO_CURSO.curso_id=CURSO.id
                        JOIN ALUNO ON ALUNO.id=ALUNO_CURSO.aluno_id
                        WHERE ALUNO_CURSO.aluno_id=24;
SELECT * FROM DISCIPLINA;

SELECT disciplina.nome, disciplina.id FROM DISCIPLINA JOIN CURSO ON DISCIPLINA.curso_id=CURSO.id JOIN ALUNO_CURSO ON ALUNO_CURSO.curso_id=CURSO.id JOIN ALUNO ON ALUNO.id=ALUNO_CURSO.aluno_id WHERE ALUNO_CURSO.aluno_id=24;

SELECT DISCIPLINA. FROM ALUNO WHERE ID=24;

SELECT * FROM aluno_turma;

insert into aluno_turma (aluno_id, turma_id, disciplina_id, semestre_id) values (26, 1, 55, 1);

select distinct aluno.nome, aluno_curso.matricula from aluno join aluno_turma
                     on aluno.id=aluno_turma.aluno_id 
                    join aluno_curso on aluno_curso.aluno_id=aluno.id 
                    join disciplina on aluno_turma.disciplina_id=disciplina.id
                    where aluno_turma.disciplina_id=55;
select aluno.nome, aluno_curso.matricula from aluno join aluno_turma
                     on aluno.id=aluno_turma.aluno_id 
                    join aluno_curso on aluno_curso.aluno_id=aluno.id 
                    join disciplina on aluno_turma.disciplina_id=disciplina.id
                    where aluno_turma.disciplina_id=54 and aluno_turma.aluno_id=aluno_curso.aluno_id and aluno_turma.;

SELECT * FROM ALUNO_TURMA;
SELECT * FROM disciplina where id=54;

SELECT DISCIPLINA.NOME FROM DISCIPLINA WHERE ID=53;
JOIN CURSO ON DISCIPLINA.curso_id=CURSO.id;

SELECT * FROM ALUNO_CURSO;

select disciplina.nome from aluno join aluno_curso on aluno_curso.aluno_id=aluno.id;

select nome from aluno join aluno_curso on aluno_curso.aluno_id=aluno.id 
                        join aluno_turma on aluno_turma.aluno_id=aluno_curso.aluno_id;

select nome, aluno_curso.matricula from aluno join aluno_turma
                    on aluno.id=aluno_turma.aluno_id 
                    join aluno_curso on aluno_curso.aluno_id=aluno.id where aluno_turma.disciplina_id=47;

select * from aluno_turma where aluno_id=14;

select id from disciplina where nome = "Disciplina teste";
select * from aluno_turma where (aluno_id = 1 and disciplina_id = 50) and semestre_id = 1;

select aluno_turma.disciplina_id, disciplina.nome from aluno_turma join disciplina on aluno_turma.disciplina_id=disciplina.id where aluno_id=5
;

select * from aluno_curso;

select aluno_turma.aluno_id from aluno_turma where aluno_turma.aluno_id=6;

select disciplina.nome,  from disciplina join turma on turma.disciplina_id=disciplina.id join
                        aluno_turma on aluno_turma.aluno_id=6;

select aluno_turma.disciplina_id, disciplina.nome from aluno_turma join disciplina on aluno_turma.disciplina_id=disciplina.id
 where aluno_id=6;

select aluno_turma.disciplina_id, disciplina.nome from aluno_turma join disciplina on aluno_turma.disciplina_id=disciplina.id where aluno_id=6;

select * from aluno_turma;

select * from aluno;


select * from aluno_turma;

select * from aluno_curso;

                select aluno_turma.aluno_id, 
                aluno.nome, aluno_turma.semestre_id, 
                aluno_turma.disciplina_id, aluno_curso.matricula from aluno_curso 
                join aluno on aluno.id=aluno_curso.aluno_id
                join aluno_turma on aluno.id=aluno_turma.aluno_id 
                join disciplina on aluno_turma.disciplina_id=disciplina.id 
                where (select aluno_curso.matricula, aluno_curso.aluno_id, aluno_turma.aluno_id from aluno_curso join aluno_turma
                    on aluno_curso.aluno_id=aluno_turma.aluno_id) = ;



select * from aluno_curso;




select distinct disciplina.id, disciplina.nome, turma.disciplina_id from disciplina join turma on disciplina.id=turma.disciplina_id join
                        curso on disciplina.curso_id=curso.id join aluno_curso on aluno_curso.curso_id=curso.id;
select * from curso;

select aluno_turma.aluno_id,
                aluno.nome, aluno_turma.semestre_id, 
                aluno_turma.disciplina_id from aluno 
                join aluno_turma on aluno.id=aluno_turma.aluno_id 
                join disciplina on aluno_turma.disciplina_id=disciplina.id
                where aluno_turma.semestre_id=1 and aluno_turma.disciplina_id = 49;
select * from disciplina;


select aluno_turma.aluno_id,
                aluno.nome, aluno_turma.semestre_id, 
                aluno_turma.disciplina_id, aluno_curso.matricula from aluno_curso 
                join aluno on aluno.id=aluno_curso.aluno_id
                join aluno_turma on aluno.id=aluno_turma.aluno_id 
                join disciplina on aluno_turma.disciplina_id=disciplina.id
                where aluno_turma.semestre_id=1 and aluno_turma.disciplina_id = 49;

select aluno_curso.matricula from aluno_curso where aluno_id = 2;

select * from aluno_curso;
select disciplina.id, disciplina.nome, turma.disciplina_id from disciplina join turma on disciplina.id=turma.disciplina_id;

insert into renda (valor) values ('Abaixo de R$ 1000,00');
insert into renda (valor) values ('R$ 1000,00 a R$ 2000,00');
insert into renda (valor) values ('R$ 2000,00 a R$ 3000,00');
insert into renda (valor) values ('R$ 3000,00 a R$ 4000,00');
insert into renda (valor) values ('R$ 4000,00 a R$ 5000,00');
insert into renda (valor) values ('Acima de R$ 5000,00');

select disciplina.id, disciplina.nome, turma.disciplina_id, curso.nome from disciplina join turma on disciplina.id=turma.disciplina_id join
                        curso on disciplina.curso_id=curso.id;

select disciplina.id, disciplina.nome, turma.disciplina_id, curso.nome from disciplina join turma on disciplina.id=turma.disciplina_id join
                        curso on disciplina.curso_id=curso.id where disciplina.curso_id = 41;

select disciplina.id, disciplina.nome, turma.disciplina_id, aluno.id from disciplina join turma on disciplina.id=turma.disciplina_id join
                        curso on disciplina.curso_id=curso.id join aluno_curso on aluno_curso.curso_id=curso.id join aluno on
                        aluno.id=aluno_curso.aluno_id;

select * from aluno_curso;
select curso_id, nome from disciplina;
create table aluno(
	id integer primary key auto_increment,
        nome varchar(100),
        email varchar(100) unique,
        sexo char(9),
        dataN date,
        rg varchar(10) unique,
        cpf varchar(11) unique,
        nacionalidade varchar(50),
        bairro varchar(100),
        rua varchar(100),
        complemento varchar(100),
        cep varchar(100),
        numero integer,
        usuario_id integer references usuario(id),
        renda_id integer references renda(id)
        
);

create table usuario(
	id integer primary key auto_increment,
        nome varchar(100),
        email varchar(100) unique,
        dataN date,
        cpf varchar(11) unique,
        perfil_acesso varchar(15),
	username varchar(100) unique,
	password varchar(100)
  	
);

insert into usuario (nome, email, dataN, cpf, perfil_acesso, username, password) values ('Carlos Nascimento da Silva', 'carlos@carlos',  "1960-03-03", '11122233344', 'secretario(a)', 'administrador', '123');


create table tipo(
        id integer primary key auto_increment,
        nome varchar(100) unique,
        descricao varchar(100),
        usuario_id integer references usuario(id)
);

create table turno(
    id integer primary key auto_increment,
    nome varchar(15)
);

insert into turno (nome) values ('Noturno');
insert into turno (nome) values ('Vespertino');
insert into turno (nome) values ('Matutino');
insert into turno (nome) values ('Integral');

create table curso(
	id integer primary key auto_increment,
	nome varchar(100) unique,
        descricao varchar(100),
        carga_horaria integer,
        anoInicio integer,
        semestreInicio integer,
        anoTermino integer,
        semestreTermino integer,
	usuario_id integer references usuario(id),
        tipo_id integer references tipo(id),
        turno_id integer references turno(id)
);


create table disciplina(
	id integer primary key auto_increment,
	nome varchar(100),
        descricao varchar(100),
        carga_horaria integer,
	usuario_id integer references usuario(id),
        curso_id integer references curso(id) 
);

create table turma(
	id integer primary key auto_increment,
	nVagas integer,
        disciplina_id integer references disciplina(id),
        semestre_id integer references semestre(id),
	professor_id integer references usuario(id),
        usuario_id integer references usuario(id),
        curso_id integer references curso(id)
);

select * from ;


select aluno.nome, aluno_curso.matricula from aluno join aluno_curso on aluno.id=aluno_curso.aluno_id join aluno_turma on 
    aluno_turma.aluno_id=aluno_curso.aluno_id
 where aluno_curso.curso_id=75; 

select curso.id, disciplina.nome from disciplina join curso on disciplina.curso_id=curso.id
join turma on turma.disciplina_id=disciplina.id
join aluno_turma on aluno_turma.turma_id join aluno on aluno.id=aluno_turma.aluno_id;

select curso.id, disciplina.nome from disciplina join curso on disciplina.curso_id=curso.id join turma on turma.disciplina_id=disciplina.id join aluno_turma on aluno_turma.turma_id=turma.id join aluno on aluno.id=aluno_turma.aluno_id;

select disciplina.id, disciplina.nome as disc_nome, curso.nome as curso_nome from disciplina join curso on curso.id=disciplina.curso_id
                         where disciplina.curso_id=75 and order by disc_nome;

select distinct aluno.nome, aluno_curso.matricula from aluno join aluno_curso on aluno.id=aluno_curso.aluno_id 
join aluno_turma on aluno_turma.aluno_id=aluno_curso.aluno_id where aluno_curso.curso_id=76 AND aluno_turma.turma_id=50;

select distinct disciplina.id, disciplina.nome from disciplina join curso on disciplina.curso_id=curso.id join turma on turma.disciplina_id=disciplina.id join aluno_turma on aluno_turma.turma_id=turma.id join aluno on aluno.id=aluno_turma.aluno_id where disciplina.curso_id=76;

select * from disciplina;

select distinct curso.id, curso.nome from disciplina join curso on disciplina.curso_id=curso.id join turma on turma.disciplina_id=disciplina.id join aluno_turma on aluno_turma.turma_id=turma.id join aluno on aluno.id=aluno_turma.aluno_id;

select * from disciplina where curso_id=79;

select distinct turma.id, disciplina.nome from disciplina join turma on turma.disciplina_id=disciplina.id where disciplina.curso_id=79;


select distinct aluno.nome, aluno_curso.matricula from aluno join aluno_curso on aluno.id=aluno_curso.aluno_id join aluno_turma on aluno_turma.aluno_id=aluno_curso.aluno_id where aluno_curso.curso_id=79 AND aluno_turma.turma_id=54;

select distinct turma.id, disciplina.nome from disciplina join curso on disciplina.curso_id=curso.id join turma on turma.disciplina_id=disciplina.id where disciplina.curso_id=79;

select distinct curso.id, curso.nome from disciplina join curso on disciplina.curso_id=curso.id join turma on turma.disciplina_id=disciplina.id join aluno_turma on aluno_turma.turma_id=turma.id join aluno on aluno.id=aluno_turma.aluno_id;

select distinct 
curso.id, curso.nome from disciplina join curso on disciplina.curso_id=curso.id join turma on turma.disciplina_id=disciplina.id join aluno_turma on aluno_turma.turma_id=turma.id join aluno on aluno.id=aluno_turma.aluno_id;

select distinct curso.id, curso.nome from disciplina join curso on disciplina.curso_id=curso.id join turma on turma.disciplina_id=disciplina.id;
select distinct curso.id, curso.nome from disciplina join curso on disciplina.curso_id=curso.id join turma on turma.disciplina_id=disciplina.id join aluno_turma on aluno_turma.turma_id=turma.id join aluno on aluno.id=aluno_turma.aluno_id



select distinct curso.id, curso.nome from disciplina join curso on disciplina.curso_id=curso.id join turma on turma.disciplina_id=disciplina.id join aluno_turma on aluno_turma.turma_id=turma.id join aluno on aluno.id=aluno_turma.aluno_id;


select turma.id, disciplina.nome from turma join disciplina on turma.disciplina_id=disciplina.id join aluno_curso 
                         on aluno_curso.aluno_id=44;

select turma.id, disciplina.nome from turma join disciplina on turma.disciplina_id=disciplina.id join aluno_curso 
                         on aluno_curso.curso_id=disciplina.curso_id where aluno_curso.;

select disciplina.nome from disciplina join turma
                      on disciplina.id=turma.disciplina_id;

select turma.id, disciplina.nome from turma join disciplina on turma.disciplina_id=disciplina.id;

select * from aluno_curso;


select disciplina.nome from disciplina join turma
                      on disciplina.id=turma.disciplina_id JOIN 
                   CURSO ON DISCIPLINA.curso_id=CURSO.id JOIN ALUNO_CURSO 
                      ON ALUNO_CURSO.curso_id=CURSO.id JOIN ALUNO 
                      ON ALUNO.id=ALUNO_CURSO.aluno_id 
                      WHERE ALUNO_CURSO.aluno_id=38;
select * from aluno;
select * from curso;
select * from disciplina;
select * from turma;
select * from aluno_curso;
select * from aluno_turma;
select turma.id, disciplina.nome from disciplina join turma on turma.disciplina_id=disciplina.id;

select aluno.nome, aluno_curso.matricula from aluno join aluno_curso on aluno.id=aluno_curso.aluno_id where aluno_curso.curso_id=74;

select aluno.nome, aluno_curso.matricula from aluno join aluno_curso on aluno.id=aluno_curso.aluno_id
                    join aluno_turma on aluno_curso.curso_id
                    where aluno_turma.turma_id=39;
select distinct aluno.nome, aluno_curso.matricula from aluno join aluno_curso on aluno.id=aluno_curso.aluno_id
                    join turma on aluno_curso.curso_id=turma.curso_id 
                    where turma.id=39;





select turma.id, disciplina.nome from turma join disciplina on turma.disciplina_id=disciplina.id;



select ;








select * from aluno_turma;

select aluno.nome, aluno_curso.matricula 
                   from aluno join aluno_curso 
                   on aluno_curso.aluno_id=aluno.id 
                   join aluno_turma on aluno_turma.aluno_id=aluno.id
                   WHERE ALUNO_TURMA.turma_id=24;

select turma.id, nome from disciplina join turma on turma.disciplina_id=disciplina.id;

select DISTINCT aluno.nome, aluno_curso.matricula 
                  from aluno_turma join disciplina 
                  on aluno_turma.disciplina_id=disciplina.id 
                  join curso on curso.id=disciplina.curso_id 
                  join aluno_curso on aluno_curso.curso_id=curso.id 
                  join turma on turma.disciplina_id=disciplina.id 
                  JOIN ALUNO ON ALUNO.id=ALUNO_CURSO.aluno_id 
                  WHERE ALUNO_TURMA.turma_id=29;

                  select * from curso;
select DISTINCT aluno.nome, aluno_curso.matricula "
                  from aluno_turma join disciplina "
                  on aluno_turma.disciplina_id=disciplina.id 
                  join curso on curso.id=disciplina.curso_id  
                  join aluno_curso on aluno_curso.curso_id=curso.id 
                  join turma on turma.disciplina_id=disciplina.id 
                  JOIN ALUNO ON ALUNO.id=ALUNO_CURSO.aluno_id 
                  WHERE ALUNO_TURMA.turma_id=24;


select turma.curso_id, aluno.nome from aluno_curso join aluno on aluno.id=aluno_curso.aluno_id
                        join curso on turma.curso_id=curso.id;

select disciplina.nome from disciplina join turma
                      on disciplina.id=turma.disciplina_id JOIN 
                   CURSO ON DISCIPLINA.curso_id=CURSO.id JOIN ALUNO_CURSO 
                      ON ALUNO_CURSO.curso_id=CURSO.id JOIN ALUNO 
                      ON ALUNO.id=ALUNO_CURSO.aluno_id 
                      WHERE ALUNO_CURSO.aluno_id=41;

select * from aluno_turma where (aluno_id = $aluno_id and disciplina_id = $disciplina_id) and semestre_id = 1;

select aluno.nome, aluno_curso.matricula from aluno join aluno_curso on aluno_curso.aluno_id=aluno.id join curso on aluno_curso.curso_id=curso.id join disciplina on disciplina.curso_id=curso.id where disciplina.id=66;




select aluno.nome, aluno_curso.matricula from 
                 aluno join aluno_curso on aluno_curso.aluno_id=aluno.id
                join curso on aluno_curso.curso_id=curso.id
                join disciplina on disciplina.curso_id=curso.id
                where disciplina.id=62;

select curso.id from disciplina join curso on disciplina.curso_id = curso.id;

select * from aluno_turma;

DROP TABLE TURMA;
SELECT * FROM aluno_curso;
create table semestre(
    	id integer primary key auto_increment,
        valor integer
);

insert into semestre (valor) values (1);
insert into semestre (valor) values (2);
insert into semestre (valor) values (3);
insert into semestre (valor) values (4);
insert into semestre (valor) values (5);
insert into semestre (valor) values (6);
insert into semestre (valor) values (7);
insert into semestre (valor) values (8);
insert into semestre (valor) values (9);
insert into semestre (valor) values (10);
insert into semestre (valor) values (11);
insert into semestre (valor) values (12);

select aluno_curso.aluno_id, aluno_turma.aluno_id, aluno.nome, aluno_turma.semestre_id from aluno_curso join aluno_turma on aluno_curso.aluno_id=aluno_turma.aluno_id
join aluno on aluno_turma.semestre_id=3;
select aluno_curso.aluno_id, aluno_turma.aluno_id, aluno.nome, aluno_turma.semestre_id from aluno_curso join aluno_turma on aluno_curso.aluno_id=aluno_turma.aluno_id
join aluno on aluno_turma.aluno_id=aluno.id where aluno_turma.semestre_id=1;

select * from aluno_turma;
select aluno_turma.aluno_id, aluno.nome, aluno_turma.semestre_id, aluno_turma.disciplina_id from aluno 
join aluno_turma on aluno.id=aluno_turma.aluno_id join disciplina on aluno_turma.disciplina_id=disciplina.id where aluno_turma.semestre_id=1 and aluno_turma.disciplina_id = 37;

insert into aluno_turma (aluno_id, disciplina_id, semestre_id) values (4, 36, 1);

select disciplina.id, disciplina.nome, aluno_curso.disciplina_id from disciplina join aluno_curso on disciplina.id=aluno_curso.disciplina_id;
select * from aluno;

create table aluno_curso(
	id integer primary key auto_increment,
	aluno_id integer references aluno(id),
	curso_id integer references curso(id),
	semestre integer,
	ano integer,
        matricula integer
);
select id from turma;

select * from aluno_turma;
select aluno.nome, aluno_curso.matricula from aluno join aluno_turma on aluno.id=aluno_turma.aluno_id join aluno_curso on aluno_curso.aluno_id=aluno.id join disciplina on aluno_turma.disciplina_id=disciplina.id join turma on aluno_turma.turma_id=turma.id;
select aluno.nome, aluno_curso.matricula from aluno join aluno_turma
                     on aluno.id=aluno_turma.aluno_id 
                    join aluno_curso on aluno_curso.aluno_id=aluno.id 
                    join disciplina on aluno_turma.disciplina_id=disciplina.id
                    
                    


create table aluno_turma(
    id integer primary key auto_increment,
    aluno_id integer references aluno(id),
    matricula integer references aluno_curso(matricula),
    turma_id integer references turma(id),
    semestre_id integer references semestre(id),
    disciplina_id integer references disciplina(id)
);
select aluno_turma.semestre_id from aluno_turma;
select * from turma;

select * from turma where disciplina_id=55 and semestre_id=1;
insert into aluno_turma (aluno_id, turma_id, disciplina_id, semestre_id) (select id from turma where disciplina_id=55 and semestre_id=1);



select * from DISCIPLINA;
drop table aluno_turma;

select id, nome from disciplina;