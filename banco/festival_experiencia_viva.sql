
create database festival_experiencia_viva;

create table participantes(
	
    id_participante int auto_increment primary key,
    nome varchar(250) not null,
    email varchar(250) not null unique,
    telefone varchar(20) not null,
    data_cadastro datetime default current_timestamp
);

create table atividades(
	
    id_atividade int auto_increment primary key,
    nome varchar(150) not null,
    descricao text,
    data_atividade date not null,
    hora_inicio time not null,
    hora_fim time not null,
    local_atividade varchar(150) not null,
    capacidade int not null
);

create table incricoes(
	
    id_inscricao int auto_increment primary key,
    id_participante int not null,
    id_atividade int not null,
    data_inscricao datetime default current_timestamp,
    status enum('ATIVA', 'CANCELADA') default 'ATIVA',
    
	constraint fk_inscricao_participante
	foreign key (id_participante)
    references participantes(id_participante)
    on delete cascade,
    
    constraint fk_incricao_atividade
    foreign key (id_atividade)
    references atividades(id_atividade), 
    
    constraint uk_participante_atividade
    unique (id_participante, id_atividade)
);