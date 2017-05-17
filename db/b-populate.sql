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
	('Keepers Stout', 'Lighthouse', 'This one\'s a keeper', '/dbImages/beer_stout_keepers.png', '6 pack', 12.49, 3),
	('Seaport Vanilla Stout', 'Lighthouse', 'Its good, trust us', '/dbImages/beer_stout_seaport.png', '6 pack', 12.99, 3),
	('Voltage Espresso Stout', 'Hoyne', 'If you need something to jolt you', '/dbImages/beer_stout_voltage.png', 'Bomber', 5.49, 3),
	('Son of Morning Tee', 'Driftwood', '100% cotten 3/4 sleave shirt', '/dbImages/clothing_driftwood_shirt.png', null, 25.00, 5),
	('Grey Snap Back Hat', 'Four Winds', 'Cotten twill snap back ball cap', '/dbImages/clothing_fourwinds_hat.png', null, 30.00, 5),
	('Toque', 'Phillips', 'made for the Great White North', '/dbImages/clothing_phillips_toque.png', null, 17.85, 5),
	('Pint Sleeve', 'Phillips', '16oz phoenix head sleeve', '/dbImages/glassware_phillips_glass.png', null, 4.95, 6),
	('Buck Head Growler', 'Phillips', 'A slick looking growler bottle', '/dbImages/glassware_phillips_growler.png', null, 5.00, 6),
	('Fat Tug Lure', 'Driftwood', 'Guaranteed to catch the big one.', '/dbImages/other_driftwood_lure.png', null, 7.00, 7),
	('Growler Carrier', 'Four Winds', 'Hand made, insulated growler carrier', '/dbImages/other_fourwinds_growlerCarrier.png', null, 40.00, 7),
	('Amnesiac Plaque', 'Phillips', 'Ready to hang on the wall', '/dbImages/other_phillips_amnesiac_plaque.png', null, 26.78, 7),
	('Bottle Opener', 'Phillips', 'The worlds best bottle opener!', '/dbImages/other_phillips_bottle_opener.png', null, 2.49, 7); 
	
INSERT INTO tblUsers
(first_name,
 last_name,
 email,
 address,
 phone,
 password
)
Values
('Georgi','Angelov', 'georgi_angelov@zoho.com', '2771 Jacklin Rd.','2508581220','123456'),
('Matt', 'Milholm', 'mmilholm@gmail.com', '1405 Esquimalt Rd.', '2506616945', 'abc123'),
('Bob', 'Dole', 'abc@gmail.com', '1 Esquimalt Rd.', '2501234567', 'asd123'),
('Tom', 'Plavetic', 'tominhulk@gmail.com', '4496 Wilkinson road', '2508021868', 'tom123');