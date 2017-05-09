INSERT INTO tblProductCategories
	(cat_name)
VALUES
	('Ale'),
	('Lager'),
	('Stout');
INSERT INTO tblProducts
	(prod_name,
  product_description,
  prod_picture,
  product_price,
  cat_id)
  VALUES('Blue Buck','good beer', '/dbImages/beer_ale_bluebuck.png',11.99,1 ),
		('Cypress Honey Lager','another good beer', '/dbImages/beer_lager_cypresshoney.png ',13.99,2 ),
		('MOCHA','good beer', '/dbImages/beer_stout_mocha.png',12.49,3 );		
	