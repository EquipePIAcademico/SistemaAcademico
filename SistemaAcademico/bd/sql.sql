create database bancoSistema;

create table frequencia(
    id integer primary key auto_increment,
    frequencia varchar(10),
    aluno_id integer,
    turma_id integer, 
    data date
);



select aluno.id, aluno.nome, aluno_curso.matricula, frequencia.frequencia from aluno join 
                    aluno_curso on aluno.id=aluno_curso.aluno_id join frequencia on frequencia.aluno_id = aluno_curso.aluno_id join 
                    turma on turma.id=frequencia.turma_id where aluno_curso.curso_id=15 and frequencia.turma_id=20 and 
                    frequencia.data='2018/11/16' order by aluno.nome;

select * from frequencia;





select * from frequencia;

select distinct aluno.id, aluno.nome, aluno_curso.matricula, sum(nota)/count(nota) as media from aluno join aluno_curso on aluno.id=aluno_curso.aluno_id
join aluno_turma on aluno_turma.aluno_id=aluno_curso.aluno_id join nota on nota.aluno_id=aluno_turma.aluno_id 
where aluno_curso.curso_id=16 AND aluno_turma.turma_id=21 and nota.turma_id=21 group by nota.aluno_id order by nota.aluno_id;

select nota.aluno_id, sum(nota)/count(nota) as media from nota join turma on turma.id=nota.turma_id join curso on curso.id=turma.curso_id where curso.id = 15 group by aluno_id order by aluno_id;






select nota.aluno_id, sum(nota)/count(nota) as media from nota join turma on turma.id=nota.turma_id join curso on curso.id=turma.curso_id where curso.id = 14 group by aluno_id order by aluno_id;






select * from nota;select nota.aluno_id, sum(nota)/count(nota) as media from nota join turma on turma.id=nota.turma_id join curso on curso.id=turma.curso_id where curso.id = 10 group by aluno_id order by aluno_id;
select nota.aluno_id, sum(nota)/count(nota) as media from nota join turma on turma.id=nota.turma_id join curso on curso.id=turma.curso_id where curso.id = 15 group by aluno_id order by aluno_id;

select nota.aluno_id, sum(nota)/count(nota) as media from nota join turma on turma.id=nota.turma_id join curso on curso.id=turma.curso_id where curso.id = 13 group by aluno_id order by aluno_id;


create table nota(
    id integer primary key auto_increment,
    dataAvaliacao date,
    descricao varchar(100),
    aluno_id integer, 
    turma_id integer, 
    nota float
);

create table renda(
    id integer primary key auto_increment,
    valor varchar(30)
);

insert into renda (valor) values ('Abaixo de R$ 1000,00');
insert into renda (valor) values ('R$ 1000,00 a R$ 2000,00');
insert into renda (valor) values ('R$ 2000,00 a R$ 3000,00');
insert into renda (valor) values ('R$ 3000,00 a R$ 4000,00');
insert into renda (valor) values ('R$ 4000,00 a R$ 5000,00');
insert into renda (valor) values ('Acima de R$ 5000,00');

create table aluno(
	id integer primary key auto_increment,
        nome varchar(100),
        email varchar(100) unique,
        sexo char(9),
        dataN date,
        rg varchar(10) unique,
        cpf varchar(15) unique,
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
        cpf varchar(15) unique,
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

create table aluno_curso(
	id integer primary key auto_increment,
	aluno_id integer references aluno(id),
	curso_id integer references curso(id),
	semestre integer,
	ano integer,
        matricula integer
);

create table aluno_turma(
    id integer primary key auto_increment,
    aluno_id integer references aluno(id),
    matricula integer references aluno_curso(matricula),
    turma_id integer references turma(id),
    semestre_id integer references semestre(id),
    disciplina_id integer references disciplina(id)
);

select disciplina.nome, nota.nota from nota join turma on turma.id=nota.turma_id join disciplina on 
disciplina.id=turma.disciplina_id where nota.aluno_id=1 and turma.curso_id=6 group by disciplina.nome;

select disciplina.nome, sum(nota.nota), count(nota.nota) from nota join turma on turma.id=nota.turma_id join disciplina on 
disciplina.id=turma.disciplina_id where (nota.aluno_id=1 and turma.curso_id=6) and disciplina.nome='Empreendedorismo';

select disciplina.nome, count(frequencia.frequencia) from frequencia join turma on turma.id=frequencia.turma_id 
join disciplina on disciplina.id=turma.disciplina_id where frequencia.aluno_id=1 and disciplina.nome='Empreendedorismo';

select disciplina.nome, count(frequencia.frequencia) from frequencia join turma on turma.id=frequencia.turma_id 
join disciplina on disciplina.id=turma.disciplina_id where (frequencia.aluno_id=1 and disciplina.nome='Empreendedorismo') and frequencia.frequencia='presenca';

