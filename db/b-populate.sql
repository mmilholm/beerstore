use BeerStoreDB;

INSERT INTO tblProductCategories
	(cat_name)
VALUES
	('Ale'),
	('Lager'),
	('Stout'),
	('IPA'),
	('Clothing'),
	('Glassware'),
	('Accessories');
	
	
INSERT INTO tblProducts
	(prod_name,
	company_name,
  	prod_description,
  	prod_picture,
  	prod_package,
  	prod_price,
  	cat_id)
  VALUES
  	('Blue Buck','Phillips', '#1 craft beer!', '/dbImages/beer_ale_bluebuck.png','6 pack', 11.99, 1),
  	('Carmanah Ale', 'Vancouver Island Brewing', 'Flavour is as deep as a forest of Sitka spruces.', '/dbImages/beer_ale_carmanah.png', '6 pack', 11.99, 1),
  	('Dark Matter', 'Hoyne', 'A dark twist on a ale', '/dbImages/beer_ale_darkmatter.png', 'Bomber', 5.59, 1),
  	('Maple Shack Cream Ale', 'Granville Island', 'A touch of Canadian maple', '/dbImages/beer_ale_mapleshack.png', '6 pack', 12.49, 1),
  	('Devils Dream IPA', 'Hoyne', 'If the devil brewed beer this would be it', '/dbImages/beer_ipa_devilsdream.png', 'Bomber', 6.59, 4),
  	('HopCircle IPA', 'Phillips', 'A special gift from planet X', '/dbImages/beer_ipa_hopcircle.png', '6 pack', 13.49, 4),
  	('Infamous IPA', 'Granville Island', 'So famous, it\'s infamous!', '/dbImages/beer_ipa_infamous.png', '6 pack', 14.99, 4),
  	('Shipwreck IPA', 'Lighthouse', 'A good beer to get wrecked', '/dbImages/beer_ipa_shipwreck.png', '6 pack', 12.99, 4),
  	('Company Lager', 'Lighthouse', 'When you need 6 friends to keep you company', '/dbImages/beer_lager_company.png', '6 pack', 10.49, 2),
	('Cypress Honey Lager', 'Granville Island', 'Pooh go to brew!', '/dbImages/beer_lager_cypresshoney.png', '6 pack', 13.99, 2),
	('Helios', 'Hoyne', 'A hot seller', '/dbImages/beer_lager_helios.png', 'Bomber', 4.99, 2),
	('Victoria Lager', 'Vancouver Island Brewing', 'A brew made to be drunk in Victoria', '/dbImages/beer_lager_victoria.png', '6 pack', 11.49, 2),
	('Keepers Stout', 'Lighthouse', 'This one\'s a keeper', '/dbImages/beer_stout_keepers', '6 pack', 12.49, 3),
	('Seaport Vanilla Stout', 'Lighthouse', 'Its good, trust us', '/dbImages/beer_stout_seaport.png', '6 pack', 12.99, 3),
	('Voltage Espresso Stout', 'Hoyne' 'If you need something to jolt you', '/dbImages/beer_stout_voltage.png', 'Bomber', 5.49, 3);
				
	