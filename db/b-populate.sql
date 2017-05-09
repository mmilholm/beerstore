use BeerStoreDB;
INSERT INTO tblProductCategories
	(cat_name)
VALUES
	('Ale'),
	('Lager'),
	('Stout');
INSERT INTO tblProducts
	(prod_name,
  prod_description,
  prod_picture,
  prod_price,
  cat_id)
  VALUES('Blue Buck','good beer', '/dbImages/beer_ale_bluebuck.png',11.99,1 ),
		('Cypress Honey Lager','another good beer', '/dbImages/beer_lager_cypresshoney.png ',13.99,2 ),
		('Mocha Porter','good beer', '/dbImages/beer_stout_mocha.png',12.49,3 );		
	