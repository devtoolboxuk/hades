CREATE TABLE `tartarus` (
`ip_address` bigint(20) NOT NULL,
`type` enum('W','B','T') NOT NULL DEFAULT 'T',
`comment` varchar(255) DEFAULT NULL,
`updated_at` datetime NOT NULL DEFAULT current_timestamp(),
KEY `idx_ip_address` (`ip_address`),
KEY `idx_updated` (`updated_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `hades_log` (
`ip_address` bigint(20) NOT NULL,
`score` int(20) NOT NULL,
`reference` TEXT COLLATE utf8_general_ci DEFAULT NULL,
`type` varchar(255) NOT NULL,
`comment` TEXT COLLATE utf8_general_ci DEFAULT NULL,
`updated_at` datetime NOT NULL DEFAULT current_timestamp(),
KEY `idx_ip_address` (`ip_address`),
KEY `idx_updated` (`updated_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




