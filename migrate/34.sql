ALTER TABLE `mythicaldash_payments` ADD `getaway` ENUM('stripe','mythicalpay') NOT NULL DEFAULT 'mythicalpay' AFTER `code`;