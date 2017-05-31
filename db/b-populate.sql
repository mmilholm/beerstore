 use BeerStoreDB;

INSERT INTO tblProductCategories
	(cat_name, prod_type)
VALUES
	('Beer', null),
    ('Merchandise', null),
	('Ale', 1),
	('Lager', 1),
	('Stout', 1),
	('IPA', 1),
	('Clothing', 2),
	('Glassware', 2),
	('Accessories', 2);
	
	
INSERT INTO tblProducts
	(prod_name,
	company_name,
  	prod_description,
  	prod_picture,
  	prod_package,
  	prod_price,
  	cat_id)
  VALUES
  	('Blue Buck','Phillips', '#1 craft beer!', '/dbImages/beer_ale_bluebuck.png','6 pack', 11.99, 3),
  	('Carmanah Ale', 'Vancouver Island Brewing', 'Flavour is as deep as a forest of Sitka spruces.', '/dbImages/beer_ale_carmanah.png', '6 pack', 11.99, 3),
  	('Dark Matter', 'Hoyne', 'A dark twist on a ale', '/dbImages/beer_ale_darkmatter.png', 'Bomber', 5.59, 3),
  	('Maple Shack Cream Ale', 'Granville Island', 'A touch of Canadian maple', '/dbImages/beer_ale_mapleshack.png', '6 pack', 12.49, 3),
  	('Devils Dream IPA', 'Hoyne', 'If the devil brewed beer this would be it', '/dbImages/beer_ipa_devilsdream.png', 'Bomber', 6.59, 6),
  	('HopCircle IPA', 'Phillips', 'A special gift from planet X', '/dbImages/beer_ipa_hopcircle.png', '6 pack', 13.49, 6),
  	('Infamous IPA', 'Granville Island', 'So famous, it\'s infamous!', '/dbImages/beer_ipa_infamous.png', '6 pack', 14.99, 6),
  	('Shipwreck IPA', 'Lighthouse', 'A good beer to get wrecked', '/dbImages/beer_ipa_shipwreck.png', '6 pack', 12.99, 6),
  	('Company Lager', 'Lighthouse', 'When you need 6 friends to keep you company', '/dbImages/beer_lager_company.png', '6 pack', 10.49, 4),
	('Cypress Honey Lager', 'Granville Island', 'Pooh go to brew!', '/dbImages/beer_lager_cypresshoney.png', '6 pack', 13.99, 4),
	('Helios', 'Hoyne', 'A hot seller', '/dbImages/beer_lager_helios.png', 'Bomber', 4.99, 4),
	('Victoria Lager', 'Vancouver Island Brewing', 'A brew made to be drunk in Victoria', '/dbImages/beer_lager_victoria.png', '6 pack', 11.49, 4),
	('Keepers Stout', 'Lighthouse', 'This one\'s a keeper', '/dbImages/beer_stout_keepers.png', '6 pack', 12.49, 5),
	('Seaport Vanilla Stout', 'Lighthouse', 'Its good, trust us', '/dbImages/beer_stout_seaport.png', '6 pack', 12.99, 5),
	('Voltage Espresso Stout', 'Hoyne', 'If you need something to jolt you', '/dbImages/beer_stout_voltage.png', 'Bomber', 5.49, 5),
	('Son of Morning Tee', 'Driftwood', '100% cotten 3/4 sleave shirt', '/dbImages/clothing_driftwood_shirt.png', null, 25.00, 7),
	('Grey Snap Back Hat', 'Four Winds', 'Cotten twill snap back ball cap', '/dbImages/clothing_fourwinds_hat.png', null, 30.00, 7),
	('Toque', 'Phillips', 'made for the Great White North', '/dbImages/clothing_phillips_toque.png', null, 17.85, 7),
	('Pint Sleeve', 'Phillips', '16oz phoenix head sleeve', '/dbImages/glassware_phillips_glass.png', null, 4.95, 8),
	('Buck Head Growler', 'Phillips', 'A slick looking growler bottle', '/dbImages/glassware_phillips_growler.png', null, 5.00, 8),
	('Fat Tug Lure', 'Driftwood', 'Guaranteed to catch the big one.', '/dbImages/other_driftwood_lure.png', null, 7.00, 9),
	('Growler Carrier', 'Four Winds', 'Hand made, insulated growler carrier', '/dbImages/other_fourwinds_growlerCarrier.png', null, 40.00, 9),
	('Amnesiac Plaque', 'Phillips', 'Ready to hang on the wall', '/dbImages/other_phillips_amnesiac_plaque.png', null, 26.78, 9),
	('Bottle Opener', 'Phillips', 'The worlds best bottle opener!', '/dbImages/other_phillips_bottle_opener.png', null, 2.49, 9); 
	
INSERT INTO tblUsers
(first_name,
 last_name,
 email,
 address,
 city,
 country,
 postal_code,
 phone,
 password
)
Values
('Georgi','Angelov', 'georgi_angelov@zoho.com', '2771 Jacklin Rd.', 'Victoria', 'Canada', 'V9V1M3', '2508581220','123456'),
('Matt', 'Milholm', 'mmilholm@gmail.com', '1405 Esquimalt Rd.', 'Victoria', 'Canada', 'V9V1M3', '2506616945', 'abc123'),
('Bob', 'Dole', 'abc@gmail.com', '1 Esquimalt Rd.', '2501234567', 'Victoria', 'Canada', 'V9V1M3', 'asd123'),
('Tom', 'Plavetic', 'tominhulk@gmail.com', '4496 Wilkinson road', 'Victoria', 'Canada', 'V9V1M3', '2508021868', 'tom123');