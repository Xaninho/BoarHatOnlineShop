SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

    -- TABLES
    
CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `dish` (
  `item_id` int(11) NOT NULL,
  `category_id` varchar(200) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_register` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile_image` varchar(100),
  `register_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `wishlist` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

    -- ALTER PRIMARY KEYS & AUTO-INCREMENT

ALTER TABLE `dish`
  ADD PRIMARY KEY (`item_id`);

ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

ALTER TABLE `dish`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

    -- SEED SOME DATA

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Meat'),
(2, 'Fish'),
(3, 'Salad'),
(4, 'Dessert'),
(5, 'Snack'),
(6, 'Pie');

INSERT INTO `dish` (`item_id`, `category_id`, `item_name`, `item_price`, `item_image`, `item_register`) VALUES
(1, 6, 'Sweet Meat Pie', 9.99, './assets/images/dishes/sweet_meat_pie.png', '2020-10-09 14:31:17'),
(2, 6, 'Vegetable Meat Pie', 9.99, './assets/images/dishes/vegetable_meat_pie.png', '2020-10-09 14:31:17'),
(3, 6, 'Milk Meat Pie', 9.99, './assets/images/dishes/milk_meat_pie.png', '2020-10-09 14:31:17'),
(4, 1, 'Chicken Matango Tamagoyaki', 11.99, './assets/images/dishes/chicken_matango_tamagoyaki.png', '2020-10-09 14:31:17'),
(5, 1, 'Chicken Matango Grilled with Butter', 11.99, './assets/images/dishes/chicken_matango_grilled_with_butter.png', '2020-10-09 14:31:17'),
(6, 1, 'Honey-roasted Chicken Matango', 11.99, './assets/images/dishes/honey-roasted_chicken_matango.png', '2020-10-09 14:31:17'),
(7, 1, 'Pepper Grilled Beef', 11.99, './assets/images/dishes/pepper_grilled_beef.png', '2020-10-09 14:31:17'),
(8, 1, 'Salt Grilled Beef', 11.99, './assets/images/dishes/salt_grilled_beef.png', '2020-10-09 14:31:17'),
(9, 1, 'Herb Grilled Beef', 11.99, './assets/images/dishes/herb_grilled_beef.png', '2020-10-09 14:31:17'),
(10, 4, 'Milk Pudding', 5.99, './assets/images/dishes/milk_pudding.png', '2020-10-09 14:31:17'),
(11, 4, 'Egg Pudding', 5.99, './assets/images/dishes/egg_pudding.png', '2020-10-09 14:31:17'),
(12, 4, 'Honey Pudding', 5.99, './assets/images/dishes/honey_pudding.png', '2020-10-09 14:31:17'),
(13, 1, 'Sand Crawler Grilled with Salt', 11.99, './assets/images/dishes/sand_crawler_grilled_with_salt.png', '2020-10-09 14:31:17'),
(14, 1, 'Sand Crawler Grilled with Butter', 11.99, './assets/images/dishes/sand_crawler_grilled_with_butter.png', '2020-10-09 14:31:17'),
(15, 1, 'Sand Crawler Grilled with Herbs', 11.99, './assets/images/dishes/sand_crawler_grilled_with_herbs.png', '2020-10-09 14:31:17'),
(16, 5, 'Bread and Cheese with Sugar', 3.99, './assets/images/dishes/bread_and_cheese_with_sugar.png', '2020-10-09 14:31:17'),
(17, 5, 'Bread and Cheese with Pepper', 3.99, './assets/images/dishes/bread_and_cheese_with_pepper.png', '2020-10-09 14:31:17'),
(18, 5, 'Bread and Cheese with Vegetables', 3.99, './assets/images/dishes/bread_and_cheese_with_vegetables.png', '2020-10-09 14:31:17'),
(19, 4, 'Milk and Strawberry Combo', 5.99, './assets/images/dishes/milk_and_strawberry_combo.png', '2020-10-09 14:31:17'),
(20, 4, 'Butter and Strawberry Combo', 5.99, './assets/images/dishes/butter_and_strawberry_combo.png', '2020-10-09 14:31:17'),
(21, 4, 'Herbs and Strawberry Combo', 5.99, './assets/images/dishes/herbs_and_strawberry_combo.png', '2020-10-09 14:31:17'),
(22, 4, 'Raisins with Sugar', 5.99, './assets/images/dishes/raisins_with_sugar.png', '2020-10-09 14:31:17'),
(23, 4, 'Raisins with Pepper', 5.99, './assets/images/dishes/raisins_with_pepper.png', '2020-10-09 14:31:17'),
(24, 4, 'Raisins with Salt', 5.99, './assets/images/dishes/raisins_with_salt.png', '2020-10-09 14:31:17'),
(25, 3, 'Honey Salad', 3.99, './assets/images/dishes/honey_salad.png', '2020-10-09 14:31:17'),
(26, 3, 'Vegetable Salad', 3.99, './assets/images/dishes/vegetable_salad.png', '2020-10-09 14:31:17'),
(27, 3, 'Egg Salad', 3.99, './assets/images/dishes/egg_salad.png', '2020-10-09 14:31:17'),
(28, 1, 'Fried Chicken', 11.99, './assets/images/dishes/fried_chicken.png', '2020-10-09 14:31:17'),
(29, 1, 'Chicken Steak', 11.99, './assets/images/dishes/chicken_steak.png', '2020-10-09 14:31:17'),
(30, 1, 'Glazed Chicken', 11.99, './assets/images/dishes/glazed_chicken.png', '2020-10-09 14:31:17'),
(31, 1, 'Sugar Grilled Chicken Wings', 11.99, './assets/images/dishes/sugar_grilled_chicken_wings.png', '2020-10-09 14:31:17'),
(32, 1, 'Pepper Grilled Chicken Wings', 11.99, './assets/images/dishes/pepper_grilled_chicken_wings.png', '2020-10-09 14:31:17'),
(33, 1, 'Salt Grilled Chicken Wings', 11.99, './assets/images/dishes/salt_grilled_chicken_wings.png', '2020-10-09 14:31:17'),
(34, 1, 'Chicken Rice Ball with Butter', 11.99, './assets/images/dishes/chicken_rice_ball_with_butter.png', '2020-10-09 14:31:17'),
(35, 1, 'Chicken Veggie Fried Rice', 11.99, './assets/images/dishes/chicken_veggie_fried_rice.png', '2020-10-09 14:31:17'),
(36, 1, 'Chicken and Egg Risotto', 11.99, './assets/images/dishes/chicken_and_egg_risotto.png', '2020-10-09 14:31:17'),
(37, 6, 'Vegetable Apple Pie', 9.99, './assets/images/dishes/vegetable_apple_pie.png', '2020-10-09 14:31:17'),
(38, 6, 'Sweet Apple Pie', 9.99, './assets/images/dishes/sweet_apple_pie.png', '2020-10-09 14:31:17'),
(39, 6, 'Honey Apple Pie', 9.99, './assets/images/dishes/honey_apple_pie.png', '2020-10-09 14:31:17'),
(40, 5, 'Herb Ciabatta', 3.99, './assets/images/dishes/herb_ciabatta.png', '2020-10-09 14:31:17'),
(41, 5, 'Pepper Bread', 3.99, './assets/images/dishes/pepper_bread.png', '2020-10-09 14:31:17'),
(42, 5, 'Egg Sandwich', 3.99, './assets/images/dishes/egg_sandwich.png', '2020-10-09 14:31:17'),
(43, 2, 'Seafood Stew', 15.99, './assets/images/dishes/seafood_stew.png', '2020-10-09 14:31:17'),
(44, 2, 'Seafood Pasta', 15.99, './assets/images/dishes/seafood_pasta.png', '2020-10-09 14:31:17'),
(45, 2, 'Seafood Pot', 15.99, './assets/images/dishes/seafood_pot.png', '2020-10-09 14:31:17');

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `password`, `profile_image`, `register_date`) VALUES
(1, 'Meliodas', 'Sama', 'email@email.com', '123456789', 'profileImg', '2020-10-09 14:31:17'),
(2, 'Escanor', 'The One', 'email@email.com', '123456789', 'profileImg', '2020-10-09 14:31:17');

COMMIT;