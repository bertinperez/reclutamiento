CREATE database practicantes;
use practicantes
create table empresa(idEmpresa int not null primary key AUTO_INCREMENT, 
	nosotros longtext not null, 
	mision longtext not null, 
	vision longtext not null, 
	objetivo longtext not null)
ENGINE=InnoDB  DEFAULT CHARSET=utf8;

insert into empresa values(null,
	'Somos un grupo de profesionistas y académicos especializados en las áreas de estrategias y desarrollo de proyectos. Estamos enfocados en diseñar proyectos de manera personalizada a través de la detección de necesidades de los clientes, lo que nos permite otorgarles la solución más adecuada para contribuir al logro de sus metas; los ámbitos que abarcamos son los siguientes: proyectos sociales, proyectos productivos, proyectos empresariales y proyectos de infraestructura. Buscamos impactar socialmente en cada proyecto que se diseña, a través de personas y acciones; es de nuestro interés ser la primera experiencia laboral de los jóvenes estudiantes y/o recién egresados y brindarles herramientas integrales que amplíen su panorama profesional y les permita insertarse posteriormente en el mercado laboral. Valdivieso Consultores S.C. se destaca por una empresa innovadora, propositiva y por procurar el talento juvenil. Actualmente el reclutamiento de practicantes se ha promovido a nivel estatal con bastante éxito, es por eso que extendemos la convocatoria a universidades del país, para que al reclutar personal del exterior, podamos fomentar el intercambio cultural e ideológico de la empresa y de los practicantes. La oferta de servicios comprende los siguientes: Consultoría en diseño y ejecución de proyectos sociales, elaboración de planes de negocios para las empresas rurales, seguimiento y elaboración de proyectos productivos del campo, elaboración y seguimiento de proyectos de infraestrucutra que tiendan a mejorar las condiciones de vida de las comunidades marginadas del Sureste de México. Puedes obtener más información sobre los servicios que la empresa ofrece en la página oficial de Valdivieso Consultores.',
	'Somos una organización conformada por jóvenes de Huatulco que busca el desarrollo mediante el apoyo, asistencia, orientación, capacitación de la juventud de nuestra comunidad.',
	'Transformar a la comunidad a partir de la participación e integración de los jóvenes de Huatulco, haciendo valer sus derechos como ciudadanos.',
	'Favorecer el desarrollo integral y sustentable de los estudiantes en las diferentes instituciones educativas de la región.');

create table valores(idValor int not null primary key AUTO_INCREMENT, 
	valor longtext) 	
ENGINE=InnoDB  DEFAULT CHARSET=utf8;

insert into valores values(null,'Respeto'),
	(null,'Honradez'),
	(null,'Honestidad'),
	(null,'Patriotismo').
	(null,'Responsabilidad').
	(null,'Tolerancia').
	(null,'Igualdad');


create table beneficios(idBeneficio int not null primary key AUTO_INCREMENT, 
	texto longtext)
ENGINE=InnoDB  DEFAULT CHARSET=utf8;

create table requisitos(idRequisito int not null primary key AUTO_INCREMENT, 
	texto longtext)
ENGINE=InnoDB  DEFAULT CHARSET=utf8;

create table usuarios(idUsuario int not null primary key AUTO_INCREMENT, 
	usuario varchar(20), 
	password varchar(30), 
	nombre varchar(50), 
	apellidos varchar(50),
	email varchar(50),
	nacimiento DATE,
	sexo varchar(10),	
	telefono varchar(15),
	imagen MEDIUMBLOB,
	tipo varchar(30))
	ENGINE=InnoDB  DEFAULT CHARSET=utf8;

create table vacantes(idVacante int not null primary key AUTO_INCREMENT,
	descripcion longtext,
	imagen MEDIUMBLOB,
	tipo varchar(30))
	ENGINE=InnoDB  DEFAULT CHARSET=utf8;

create table curriculum(idCurriculum int not null primary key AUTO_INCREMENT,
	idUsuario int,
	universidad varchar(200),	
	estudio varchar(150),
	ubicacion longtext,
	domicilio longtext,
	interes longtext,
	estado varchar(15),
	FOREIGN KEY(idUsuario) REFERENCES usuarios(idUsuario) ON DELETE CASCADE ON UPDATE CASCADE)
	ENGINE=InnoDB  DEFAULT CHARSET=utf8;

create table testimonios(idTestimonio int not null primary key AUTO_INCREMENT,
	nombre varchar(200),
	universidad varchar(200),	
	fecha DATE,
	testimonio longtext,
	imagen MEDIUMBLOB,
	tipo varchar(30))	
	ENGINE=InnoDB  DEFAULT CHARSET=utf8;


create table mensaje(id int not null primary key AUTO_INCREMENT,
	para varchar(180),
	de varchar(180),
	leido varchar(50),
	fecha varchar(180),
	asunto varchar(180),
	texto longtext)
	ENGINE=InnoDB  DEFAULT CHARSET=utf8;

create table galeria(idImagen int not null primary key AUTO_INCREMENT,
	descripcion longtext,
	imagen MEDIUMBLOB,
	tipo varchar(30))
ENGINE=InnoDB  DEFAULT CHARSET=utf8;