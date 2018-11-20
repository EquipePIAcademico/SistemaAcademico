
create database bancoSistema;

create table frequencia(
    id integer primary key auto_increment,
    frequencia varchar(10),
    aluno_id integer,
    turma_id integer, 
    data date
);

select nome from disciplina join turma on turma.disciplina_id=disciplina.id where turma.id=25;
select disciplina.nome, sum(nota.nota) as somaNotas, count(nota.nota) as qtdNotas from nota join turma on 
                                turma.id=nota.turma_id join disciplina on disciplina.id=turma.disciplina_id where turma.curso_id=15 and disciplina.nome='Paisagem';

select count(frequencia.frequencia) as qtdPresencas from frequencia where turma_id=20 and frequencia.frequencia='presenca' group by aluno_id order by aluno_id;

select nota.aluno_id, sum(nota)/count(nota) as media from nota join turma on turma.id=nota.turma_id join curso on curso.id=turma.curso_id where curso.id = 15 group by aluno_id order by aluno_id;


select * from curso;

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


select * from curso;
select * from disciplina;
select * from turma;
select * from aluno_curso;
select * from aluno_turma;

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

select disciplina.nome from disciplina join turma on turma.disciplina_id=disciplina.id where disciplina.id=19;
select * from disciplina;

SELECT * FROM nota;
