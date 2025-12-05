-- Add product_image column to products table
ALTER TABLE `products` ADD COLUMN `product_image` VARCHAR(255) NULL AFTER `qr_code`;
