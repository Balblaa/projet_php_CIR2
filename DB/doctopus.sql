------------------------------------------------------------
--        Script Postgre 
------------------------------------------------------------



------------------------------------------------------------
-- Table: Utilisateur
------------------------------------------------------------
CREATE TABLE public.Utilisateur(
	Adresse_Email   VARCHAR (50) NOT NULL ,
	Nom             VARCHAR (50) NOT NULL ,
	Prenom          VARCHAR (50) NOT NULL ,
	Telephone       INT  NOT NULL ,
	mot_de_passe    VARCHAR (100) NOT NULL  ,
	CONSTRAINT Utilisateur_PK PRIMARY KEY (Adresse_Email)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: Genre
------------------------------------------------------------
CREATE TABLE public.Genre(
	id_genre    SERIAL NOT NULL ,
	nom_genre   VARCHAR (50) NOT NULL  ,
	CONSTRAINT Genre_PK PRIMARY KEY (id_genre)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: Medecin
------------------------------------------------------------
CREATE TABLE public.Medecin(
	id_medecin      SERIAL NOT NULL ,
	Adresse_Email   VARCHAR (50) NOT NULL ,
	Nom             VARCHAR (50) NOT NULL ,
	Prenom          VARCHAR (50) NOT NULL ,
	Telephone       INT  NOT NULL ,
	Localisation    VARCHAR (50) NOT NULL ,
	mot_de_passe    VARCHAR (100) NOT NULL ,
	Specialite      VARCHAR (50) NOT NULL ,
	id_genre        INT  NOT NULL  ,
	CONSTRAINT Medecin_PK PRIMARY KEY (id_medecin)

	,CONSTRAINT Medecin_Genre_FK FOREIGN KEY (id_genre) REFERENCES public.Genre(id_genre)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: rendez-vous
------------------------------------------------------------
CREATE TABLE public.rendez_vous(
	id_rendez_vous   SERIAL NOT NULL ,
	Date             DATE  NOT NULL ,
	Heure            TIMETZ  NOT NULL ,
	id_medecin       INT  NOT NULL  ,
	CONSTRAINT rendez_vous_PK PRIMARY KEY (id_rendez_vous)

	,CONSTRAINT rendez_vous_Medecin_FK FOREIGN KEY (id_medecin) REFERENCES public.Medecin(id_medecin)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: reserver
------------------------------------------------------------
CREATE TABLE public.reserver(
	id_rendez_vous   INT  NOT NULL ,
	Adresse_Email    VARCHAR (50) NOT NULL  ,
	CONSTRAINT reserver_PK PRIMARY KEY (id_rendez_vous,Adresse_Email)

	,CONSTRAINT reserver_rendez_vous_FK FOREIGN KEY (id_rendez_vous) REFERENCES public.rendez_vous(id_rendez_vous)
	,CONSTRAINT reserver_Utilisateur0_FK FOREIGN KEY (Adresse_Email) REFERENCES public.Utilisateur(Adresse_Email)
)WITHOUT OIDS;