create table tipoUtilizador (
	idTipoUtilizador int primary key auto_increment not null,
	descricao varchar(15) not null
);

create table utilizador (
	idUtilizador int primary key auto_increment not null,
	primeironome varchar(15) not null,
	ultimonome varchar(15) not null,
	username varchar(15) not null,
	email varchar(50) not null,
	pw varchar(20) not null,
	nif int,
	telemovel bigint,
	morada varchar(80) not null,
	idTipoUtilizador int,
	foreign key (idTipoUtilizador) references tipoUtilizador(idTipoUtilizador)
);

create table marca (
	idMarca int primary key auto_increment not null,
	nome varchar(25) not null
);

create table categoria (
	idCategoria int primary key auto_increment not null,
	descricao varchar(20) not null
);

create table produto (
	idProduto int primary key auto_increment not null,
	nome varchar(80) not null,
	preco int not null,
	descricao varchar(500) not null,
	idMarca int,
	idCategoria int,
	foreign key(idMarca) references marca(idMarca),
	foreign key(idCategoria) references categoria(idCategoria)
);

create table comentario (
	idComentario int primary key auto_increment not null,
	comentario varchar(255) not null,
	idUtilizador int,
	idProduto int,
	foreign key(idUtilizador) references utilizador(idUtilizador),
	foreign key(idProduto) references produto(idProduto)
);

create table wishlist (
	idWish int primary key auto_increment not null,
	idUtilizador int,
	idProduto int,
	foreign key(idUtilizador) references utilizador(idUtilizador),
	foreign key(idProduto) references produto(idProduto)
);

create table encomenda (
	idEncomenda int primary key auto_increment not null,
	totalEncomenda int not null,
	data date not null,
	idUtilizador int,
	foreign key(idUtilizador) references utilizador(idUtilizador)
);

create table detalhesEncomenda (
	idEncomenda int,
	idProduto int,
	foreign key(idEncomenda) references encomenda(idEncomenda),
	foreign key(idProduto) references produto(idProduto),
	quantidade int not null
);