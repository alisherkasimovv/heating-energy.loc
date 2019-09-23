-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Сен 22 2019 г., 21:06
-- Версия сервера: 5.7.27-0ubuntu0.18.04.1
-- Версия PHP: 7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `heating_energy_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 0, '2019-09-18 02:55:56', '2019-09-18 02:55:56'),
(2, 0, '2019-09-18 02:56:39', '2019-09-18 02:56:39'),
(3, 0, '2019-09-18 02:57:11', '2019-09-18 02:57:11'),
(4, 0, '2019-09-18 02:57:42', '2019-09-18 02:57:42'),
(5, 0, '2019-09-18 02:58:21', '2019-09-18 02:58:21'),
(6, 0, '2019-09-18 02:58:52', '2019-09-18 02:58:52'),
(7, 0, '2019-09-18 02:59:23', '2019-09-18 02:59:23'),
(8, 0, '2019-09-18 02:59:51', '2019-09-18 02:59:51'),
(9, 0, '2019-09-18 03:00:21', '2019-09-18 03:00:21'),
(10, 0, '2019-09-18 03:00:49', '2019-09-18 03:00:49'),
(11, 1, '2019-09-22 08:52:13', '2019-09-22 08:52:13'),
(12, 1, '2019-09-22 08:52:41', '2019-09-22 08:52:41');

-- --------------------------------------------------------

--
-- Структура таблицы `category_translations`
--

CREATE TABLE `category_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anchor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category_translations`
--

INSERT INTO `category_translations` (`id`, `category_id`, `locale`, `name`, `slug`, `anchor`) VALUES
(1, 1, 'en', 'PPR pipes and fittings', 'ppr-pipes-and-fittings', 'anchor_en'),
(2, 1, 'ru', 'ППР трубы и фитинги', 'ppr-truby-i-fitingi', 'anchor_ru'),
(3, 2, 'en', 'PVC sewer fittings and pipes', 'pvc-sewer-fittings-and-pipes', 'anchor_en'),
(4, 2, 'ru', 'ПВХ канализационные фитинги и трубы', 'pvh-kanalizacionnye-fitingi-i-truby', 'anchor_ru'),
(5, 3, 'en', 'Radiators (Panel, Aluminum, etc.)', 'radiators-panel-aluminum-etc', 'anchor_en'),
(6, 3, 'ru', 'Радиаторы (Панельные, Алюминиевые и др)', 'radiatory-panelnye-alyuminievye-i-dr', 'anchor_ru'),
(7, 4, 'en', 'Pumps (to increase water pressure, etc.)', 'pumps-to-increase-water-pressure-etc', 'anchor_en'),
(8, 4, 'ru', 'Насосы (для повышения давления воды и др)', 'nasosy-dlya-povysheniya-davleniya-vody-i-dr', 'anchor_ru'),
(9, 5, 'en', 'Tubes, manifolds and fittings', 'tubes-manifolds-and-fittings', 'anchor_en'),
(10, 5, 'ru', 'Трубы т/п, коллекторы и фитинги', 'truby-t-p-kollektory-i-fitingi', 'anchor_ru'),
(11, 6, 'en', 'Heating boilers', 'heating-boilers', 'anchor_en'),
(12, 6, 'ru', 'Отопительные котлы', 'otopitelnye-kotly', 'anchor_ru'),
(13, 7, 'en', 'Brass fittings and valves', 'brass-fittings-and-valves', 'anchor_en'),
(14, 7, 'ru', 'Латунные фитинги и клапаны', 'latunnye-fitingi-i-klapany', 'anchor_ru'),
(15, 8, 'en', 'Fittings for boiler rooms', 'fittings-for-boiler-rooms', 'anchor_en'),
(16, 8, 'ru', 'Арматура для котельных', 'armatura-dlya-kotelnyh', 'anchor_ru'),
(17, 9, 'en', 'Water filters', 'water-filters', 'anchor_en'),
(18, 9, 'ru', 'Фильтры для воды', 'filtry-dlya-vody', 'anchor_ru'),
(19, 10, 'en', 'Water heaters', 'water-heaters', 'anchor_en'),
(20, 10, 'ru', 'Водонагреватели', 'vodonagrevateli', 'anchor_ru'),
(21, 11, 'en', 'Fittings', 'fittings', 'anchor_en'),
(22, 11, 'ru', 'Фитинги', 'fitingi', 'anchor_ru'),
(23, 12, 'en', 'Pipes', 'pipes', 'anchor_en'),
(24, 12, 'ru', 'Трубы', 'truby', 'anchor_ru');

-- --------------------------------------------------------

--
-- Структура таблицы `characteristics`
--

CREATE TABLE `characteristics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `characteristics`
--

INSERT INTO `characteristics` (`id`, `product_id`, `created_at`, `updated_at`) VALUES
(3, 2, '2019-09-18 06:28:38', '2019-09-18 06:28:38'),
(4, 2, '2019-09-18 06:28:38', '2019-09-18 06:28:38'),
(9, 4, '2019-09-22 08:58:14', '2019-09-22 08:58:14'),
(11, 3, '2019-09-22 09:00:56', '2019-09-22 09:00:56'),
(12, 1, '2019-09-22 09:04:10', '2019-09-22 09:04:10');

-- --------------------------------------------------------

--
-- Структура таблицы `characteristic_translations`
--

CREATE TABLE `characteristic_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `characteristic_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anchor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `characteristic_translations`
--

INSERT INTO `characteristic_translations` (`id`, `characteristic_id`, `locale`, `key`, `value`, `anchor`) VALUES
(5, 3, 'en', 'Country', 'Turkey', 'anchor_en'),
(6, 3, 'ru', 'Страна', 'Турция', 'anchor_ru'),
(7, 4, 'en', 'Material', 'Plastic', 'anchor_en'),
(8, 4, 'ru', 'Материал', 'Пластик', 'anchor_ru'),
(17, 9, 'en', 'key1', 'val1', 'anchor_en'),
(18, 9, 'ru', 'key11', 'val11', 'anchor_ru'),
(21, 11, 'en', 'key1', 'val2', 'anchor_en'),
(22, 11, 'ru', 'key11', 'val22', 'anchor_ru'),
(23, 12, 'en', 'Material', 'Plastic', 'anchor_en'),
(24, 12, 'ru', 'Материал', 'Пластик', 'anchor_ru');

-- --------------------------------------------------------

--
-- Структура таблицы `consultation_orders`
--

CREATE TABLE `consultation_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accepted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `consultation_orders`
--

INSERT INTO `consultation_orders` (`id`, `name`, `phone`, `accepted`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 0, '2019-09-18 02:40:29', '2019-09-18 02:40:29');

-- --------------------------------------------------------

--
-- Структура таблицы `credentials`
--

CREATE TABLE `credentials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telegram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `credentials`
--

INSERT INTO `credentials` (`id`, `phone`, `email`, `facebook`, `telegram`, `instagram`, `whatsapp`, `created_at`, `updated_at`) VALUES
(1, '+998 (98) 366-76-70', 'info@heating_energy.uz', 'facebook.com', 'telegram.me', 'instagram.com', 'whatsapp.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `credential_translations`
--

CREATE TABLE `credential_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `credential_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Heating Energy',
  `company_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_info_brief` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_info_full` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anchor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `credential_translations`
--

INSERT INTO `credential_translations` (`id`, `credential_id`, `locale`, `company_name`, `company_address`, `company_info_brief`, `company_info_full`, `anchor`) VALUES
(1, 1, 'en', 'Heating Energy', 'Uzbekistan, Tashkent, Usta Shirin str., 125', 'Simple text', 'Long long text', 'anchor_en'),
(2, 1, 'ru', 'Heating Energy', 'Узбекистан, г.Ташкент, ул.Уста Ширин, 125', 'Короткий текст', 'Длинный текст', 'anchor_ru');

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `url`, `image_type`, `image_id`, `created_at`, `updated_at`) VALUES
(1, 'uploads/credentials/ooDM42kBIpIWKrY.jpeg', 'App\\Credential', 1, NULL, NULL),
(5, 'uploads/posts/T5yJlaGJpEMPhaO.jpeg', 'App\\Post', 2, '2019-09-18 04:42:23', '2019-09-18 04:42:23'),
(7, NULL, 'App\\Post', 1, '2019-09-18 04:44:12', '2019-09-18 04:44:12'),
(8, NULL, 'App\\Post', 1, '2019-09-18 04:44:25', '2019-09-18 04:44:25'),
(9, 'uploads/posts/uRGmi5bVmCh3Kt6.jpeg', 'App\\Post', 1, '2019-09-18 04:46:43', '2019-09-18 04:46:43'),
(12, 'uploads/products/f3loHDwWuq4YMXG.jpeg', 'App\\Product', 2, '2019-09-18 06:28:38', '2019-09-18 06:28:38'),
(13, 'uploads/products/7II48QmCPrJIj6u.jpeg', 'App\\Product', 2, '2019-09-18 06:28:38', '2019-09-18 06:28:38'),
(14, NULL, 'App\\Product', 2, '2019-09-18 06:28:38', '2019-09-18 06:28:38'),
(17, 'uploads/products/Ly0tNsDprHdEL59.jpeg', 'App\\Product', 4, '2019-09-22 08:58:14', '2019-09-22 08:58:14'),
(18, 'uploads/products/r2lF6OUmIMlFTdL.jpeg', 'App\\Product', 4, '2019-09-22 08:58:14', '2019-09-22 08:58:14'),
(19, 'uploads/products/uCdckiEWeNQKrAF.png', 'App\\Product', 3, '2019-09-22 09:00:56', '2019-09-22 09:00:56'),
(20, 'uploads/products/jsTIWwunepqTahi.jpeg', 'App\\Product', 1, '2019-09-22 09:04:10', '2019-09-22 09:04:10');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_09_08_134707_create_images_table', 1),
(4, '2019_09_08_134839_create_credentials_table', 1),
(5, '2019_09_08_135318_create_credential_translations_table', 1),
(6, '2019_09_10_011904_create_categories_table', 1),
(7, '2019_09_10_011942_create_category_translations_table', 1),
(8, '2019_09_10_012738_create_products_table', 1),
(9, '2019_09_10_012803_create_product_translations_table', 1),
(10, '2019_09_10_063607_create_characteristics_table', 1),
(11, '2019_09_10_063615_create_characteristic_translations_table', 1),
(12, '2019_09_10_154325_create_posts_table', 1),
(13, '2019_09_10_154354_create_post_translations_table', 1),
(14, '2019_09_11_050946_create_recommendations_table', 1),
(15, '2019_09_15_044437_create_consultation_orders_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2019-01-01',
  `status` tinyint(1) DEFAULT '0',
  `views` bigint(20) UNSIGNED DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `date`, `status`, `views`, `created_at`, `updated_at`) VALUES
(1, '2019-09-18', 0, 2, '2019-09-18 03:03:39', '2019-09-18 04:46:43'),
(2, '2019-09-18', 1, 4, '2019-09-18 04:42:22', '2019-09-20 01:15:18');

-- --------------------------------------------------------

--
-- Структура таблицы `post_translations`
--

CREATE TABLE `post_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brief` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anchor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `post_translations`
--

INSERT INTO `post_translations` (`id`, `post_id`, `locale`, `title`, `brief`, `text`, `slug`, `anchor`) VALUES
(1, 1, 'en', 'First post', 'This is a first post', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At tempore excepturi maxime placeat. A ab nobis illum saepe doloribus quam maxime officia molestiae architecto? Ad excepturi eius ea ipsam! Esse, quisquam asperiores. Temporibus repellendus at commodi architecto harum cumque dicta odit asperiores deleniti ab libero facilis, consectetur tempore expedita dolorem deserunt itaque soluta nesciunt corporis perspiciatis! Nulla cumque quam quae nam architecto quas numquam beatae maiores sequi! Molestias magnam debitis earum labore odit, officia quod unde minima error aspernatur perspiciatis. Maxime commodi, quas rerum temporibus voluptate cupiditate dignissimos iste iure doloribus veritatis accusamus modi perspiciatis aliquam molestias ex aspernatur facere sapiente animi quaerat asperiores itaque eaque nam ipsa? Exercitationem voluptatibus corporis tempora nostrum a deserunt ipsum itaque accusamus et, animi hic dolor quibusdam id atque non necessitatibus quidem doloribus. Consectetur ullam culpa deleniti! Cumque itaque placeat enim maxime obcaecati perferendis hic nobis quidem ea nostrum quisquam nam tempore nisi repellat sed necessitatibus, nesciunt expedita, dignissimos at. Fugit, accusantium ullam! Eum laudantium saepe explicabo tempora, repellat natus earum atque sapiente molestiae dolores est tempore velit ut accusantium deserunt non reprehenderit cumque quam, quibusdam odio, doloremque reiciendis! Consequatur nostrum laudantium magni explicabo enim tempora, cum, quod, accusantium accusamus voluptatibus delectus iste quam cupiditate debitis nam rerum corrupti reprehenderit. Saepe porro odio, reiciendis ducimus est illum? Veritatis dicta ipsa tenetur ad autem mollitia animi sequi impedit enim laborum esse aliquid repudiandae nulla doloribus, porro ipsum dolor rerum similique expedita consequatur soluta odio est ea facere? Inventore vero optio qui iste est, illo corporis, accusantium tempore odit, voluptate delectus non libero quisquam quos temporibus aperiam cumque ipsum dolore omnis beatae vitae nisi quibusdam obcaecati ducimus? Qui accusantium id velit, quidem quae laborum ipsa itaque maiores obcaecati numquam fuga incidunt, eaque impedit assumenda. Perferendis soluta quos itaque omnis, voluptates labore iure voluptatum cupiditate consequuntur animi temporibus ratione consequatur cum porro ipsum fugit laboriosam! Dolor aperiam, esse maiores nobis repellat, quibusdam inventore beatae dolores et possimus repudiandae libero quasi eius accusantium velit reprehenderit officiis consequuntur, officia at provident ullam illum labore. Nisi in ab atque, esse aliquam, fugit eos ducimus illo magni quod consequatur pariatur, magnam animi voluptas laboriosam reiciendis nostrum eum quas. Ab aspernatur nemo hic, beatae eius porro ut iure atque, ducimus dignissimos magni blanditiis quae aut perferendis quia repellat est expedita eveniet numquam natus commodi laudantium quam! Dignissimos reiciendis magnam iusto modi, excepturi ipsum? Numquam, non vitae exercitationem expedita quas ratione ea modi dolorem autem magni maiores? Deleniti minus, omnis libero amet fugit, repudiandae animi impedit nulla repellendus qui quisquam? Tempore aspernatur totam fugiat optio! Amet praesentium consequatur id totam quaerat nostrum nulla quisquam placeat? Harum, perspiciatis, earum voluptas, corrupti laboriosam quisquam necessitatibus eos ipsam repellendus nisi repudiandae fugiat quam incidunt recusandae saepe dicta. Nobis culpa voluptatem perferendis tempore alias autem odio, quod itaque nesciunt incidunt amet libero! Suscipit cumque labore mollitia earum, magnam unde expedita. Ipsam, debitis quas. Veritatis, magnam corporis! Assumenda voluptatum dolor officia at nobis numquam, fugiat possimus recusandae corrupti molestiae provident veniam corporis expedita repellat! Officia harum eos voluptas!</p>\r\n\r\n<h3>Lorem</h3>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At tempore excepturi maxime placeat. A ab nobis illum saepe doloribus quam maxime officia molestiae architecto? Ad excepturi eius ea ipsam! Esse, quisquam asperiores. Temporibus repellendus at commodi architecto harum cumque dicta odit asperiores deleniti ab libero facilis, consectetur tempore expedita dolorem deserunt itaque soluta nesciunt corporis perspiciatis! Nulla cumque quam quae nam architecto quas numquam beatae maiores sequi! Molestias magnam debitis earum labore odit, officia quod unde minima error aspernatur perspiciatis. Maxime commodi, quas rerum temporibus voluptate cupiditate dignissimos iste iure doloribus veritatis accusamus modi perspiciatis aliquam molestias ex aspernatur facere sapiente animi quaerat asperiores itaque eaque nam ipsa? Exercitationem voluptatibus corporis tempora nostrum a deserunt ipsum itaque accusamus et, animi hic dolor quibusdam id atque non necessitatibus quidem doloribus. Consectetur ullam culpa deleniti! Cumque itaque placeat enim maxime obcaecati perferendis hic nobis quidem ea nostrum quisquam nam tempore nisi repellat sed necessitatibus, nesciunt expedita, dignissimos at. Fugit, accusantium ullam! Eum laudantium saepe explicabo tempora, repellat natus earum atque sapiente molestiae dolores est tempore velit ut accusantium deserunt non reprehenderit cumque quam, quibusdam odio, doloremque reiciendis! Consequatur nostrum laudantium magni explicabo enim tempora, cum, quod, accusantium accusamus voluptatibus delectus iste quam cupiditate debitis nam rerum corrupti reprehenderit. Saepe porro odio, reiciendis ducimus est illum? Veritatis dicta ipsa tenetur ad autem mollitia animi sequi impedit enim laborum esse aliquid repudiandae nulla doloribus, porro ipsum dolor rerum similique expedita consequatur soluta odio est ea facere? Inventore vero optio qui iste est, illo corporis, accusantium tempore odit, voluptate delectus non libero quisquam quos temporibus aperiam cumque ipsum dolore omnis beatae vitae nisi quibusdam obcaecati ducimus? Qui accusantium id velit, quidem quae laborum ipsa itaque maiores obcaecati numquam fuga incidunt, eaque impedit assumenda. Perferendis soluta quos itaque omnis, voluptates labore iure voluptatum cupiditate consequuntur animi temporibus ratione consequatur cum porro ipsum fugit laboriosam! Dolor aperiam, esse maiores nobis repellat, quibusdam inventore beatae dolores et possimus repudiandae libero quasi eius accusantium velit reprehenderit officiis consequuntur, officia at provident ullam illum labore. Nisi in ab atque, esse aliquam, fugit eos ducimus illo magni quod consequatur pariatur, magnam animi voluptas laboriosam reiciendis nostrum eum quas. Ab aspernatur nemo hic, beatae eius porro ut iure atque, ducimus dignissimos magni blanditiis quae aut perferendis quia repellat est expedita eveniet numquam natus commodi laudantium quam! Dignissimos reiciendis magnam iusto modi, excepturi ipsum? Numquam, non vitae exercitationem expedita quas ratione ea modi dolorem autem magni maiores? Deleniti minus, omnis libero amet fugit, repudiandae animi impedit nulla repellendus qui quisquam? Tempore aspernatur totam fugiat optio! Amet praesentium consequatur id totam quaerat nostrum nulla quisquam placeat? Harum, perspiciatis, earum voluptas, corrupti laboriosam quisquam necessitatibus eos ipsam repellendus nisi repudiandae fugiat quam incidunt recusandae saepe dicta. Nobis culpa voluptatem perferendis tempore alias autem odio, quod itaque nesciunt incidunt amet libero! Suscipit cumque labore mollitia earum, magnam unde expedita. Ipsam, debitis quas. Veritatis, magnam corporis! Assumenda voluptatum dolor officia at nobis numquam, fugiat possimus recusandae corrupti molestiae provident veniam corporis expedita repellat! Officia harum eos voluptas!</p>', 'first-post', 'anchor_en'),
(2, 1, 'ru', 'Первый пост', 'Это первый пост', '<p>Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Буквенных рыбного запятых свой повстречался, рот маленький реторический использовало рукопись инициал алфавит напоивший меня сих продолжил вдали, пояс правилами имеет заманивший семь большой парадигматическая власти. Семантика, коварный? Всеми вершину грамматики снова власти даже своего речью, заголовок коварный если все он, дал подзаголовок вдали курсивных текст возвращайся жаренные своих оксмокс великий последний переписывается по всей? Рекламных текстов, букв ручеек, океана вдали алфавит взгляд родного дал наш безопасную снова семь использовало, даль коварных рыбного до! Рот подзаголовок выйти щеке заманивший, букв дороге обеспечивает бросил силуэт использовало, решила все даже! Мир рыбными продолжил, сих океана пустился города ему заголовок подзаголовок, эта они первую, от всех залетают вершину дорогу ручеек. Маленький ручеек щеке путь образ переписали гор ее напоивший грустный, предложения, свое он необходимыми текста рот переписывается буквенных использовало рекламных одна ipsum но всемогущая великий сих буквоград языком. То на берегу одна предупредила заголовок запятой живет путь, толку деревни все скатился букв ведущими коварный правилами снова единственное возвращайся безопасную до великий первую инициал что напоивший ее. Ручеек его жаренные первую lorem? Наш безорфографичный живет свою даже на берегу ведущими свое продолжил обеспечивает заглавных, последний назад коварных силуэт пор лучше дорогу маленький предупреждал текст, своих маленькая грамматики переписывается. Свое если меня, напоивший города предупреждал свой путь строчка силуэт океана но запятых. Мир залетают, вскоре живет букв, заманивший знаках даже свою но заголовок имеет города оксмокс. Грамматики, сих там он дал несколько, которое всемогущая точках буквенных семантика приставка прямо путь, о жаренные последний. Своих повстречался, грамматики если ему от всех строчка страна агентство все океана предупредила имеет, ручеек обеспечивает сих пустился наш. Моей от всех до страну они продолжил пустился собрал прямо большого! Бросил, журчит выйти рыбными взгляд буквоград единственное эта обеспечивает дал страну языком послушавшись дорогу рыбного безорфографичный его последний. Которое точках мир пустился путь курсивных диких жаренные текст там переулка вопроса не себя составитель послушавшись большого проектах маленькая ему свою, обеспечивает переписывается наш прямо рот жизни. Щеке заглавных собрал страну рукописи встретил свой меня подзаголовок текст повстречался алфавит. Все, до послушавшись деревни он использовало грустный букв жизни правилами родного. Текст предупреждал пустился буквенных жизни ему всеми журчит, себя путь продолжил послушавшись языком залетают? Моей рукописи залетают, до имени власти, предложения всемогущая рукопись заглавных напоивший своих города инициал пустился? Города, если маленькая живет языком даль меня своих сбить собрал! Использовало, переписывается пояс. Толку которой которое оксмокс на берегу знаках они запятой? Дорогу злых, предложения всеми вершину решила имени, заголовок живет своих инициал жаренные lorem семь языком встретил семантика домах щеке одна, снова своего текстов залетают продолжил. Вопроса большой буквенных это даль ipsum курсивных которой образ, по всей свой все маленький то, переулка свое грустный собрал составитель страну силуэт своих ведущими лучше ты грамматики своего. Но не lorem родного строчка составитель необходимыми, единственное пор маленький деревни вдали за наш алфавит о, ты путь бросил злых взобравшись. Назад текст вопроса рекламных, своего бросил букв всемогущая пустился города? Все, подзаголовок то! Инициал, снова рекламных дорогу, строчка грамматики то до своего своих это образ языком пунктуация, подпоясал путь грустный необходимыми вопрос? Парадигматическая реторический несколько продолжил первую они.</p>\r\n\r\n<h2><strong>Lorem</strong></h2>\r\n\r\n<p>Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Буквенных рыбного запятых свой повстречался, рот маленький реторический использовало рукопись инициал алфавит напоивший меня сих продолжил вдали, пояс правилами имеет заманивший семь большой парадигматическая власти. Семантика, коварный? Всеми вершину грамматики снова власти даже своего речью, заголовок коварный если все он, дал подзаголовок вдали курсивных текст возвращайся жаренные своих оксмокс великий последний переписывается по всей? Рекламных текстов, букв ручеек, океана вдали алфавит взгляд родного дал наш безопасную снова семь использовало, даль коварных рыбного до! Рот подзаголовок выйти щеке заманивший, букв дороге обеспечивает бросил силуэт использовало, решила все даже! Мир рыбными продолжил, сих океана пустился города ему заголовок подзаголовок, эта они первую, от всех залетают вершину дорогу ручеек. Маленький ручеек щеке путь образ переписали гор ее напоивший грустный, предложения, свое он необходимыми текста рот переписывается буквенных использовало рекламных одна ipsum но всемогущая великий сих буквоград языком. То на берегу одна предупредила заголовок запятой живет путь, толку деревни все скатился букв ведущими коварный правилами снова единственное возвращайся безопасную до великий первую инициал что напоивший ее. Ручеек его жаренные первую lorem? Наш безорфографичный живет свою даже на берегу ведущими свое продолжил обеспечивает заглавных, последний назад коварных силуэт пор лучше дорогу маленький предупреждал текст, своих маленькая грамматики переписывается. Свое если меня, напоивший города предупреждал свой путь строчка силуэт океана но запятых. Мир залетают, вскоре живет букв, заманивший знаках даже свою но заголовок имеет города оксмокс. Грамматики, сих там он дал несколько, которое всемогущая точках буквенных семантика приставка прямо путь, о жаренные последний. Своих повстречался, грамматики если ему от всех строчка страна агентство все океана предупредила имеет, ручеек обеспечивает сих пустился наш. Моей от всех до страну они продолжил пустился собрал прямо большого! Бросил, журчит выйти рыбными взгляд буквоград единственное эта обеспечивает дал страну языком послушавшись дорогу рыбного безорфографичный его последний. Которое точках мир пустился путь курсивных диких жаренные текст там переулка вопроса не себя составитель послушавшись большого проектах маленькая ему свою, обеспечивает переписывается наш прямо рот жизни. Щеке заглавных собрал страну рукописи встретил свой меня подзаголовок текст повстречался алфавит. Все, до послушавшись деревни он использовало грустный букв жизни правилами родного. Текст предупреждал пустился буквенных жизни ему всеми журчит, себя путь продолжил послушавшись языком залетают? Моей рукописи залетают, до имени власти, предложения всемогущая рукопись заглавных напоивший своих города инициал пустился? Города, если маленькая живет языком даль меня своих сбить собрал! Использовало, переписывается пояс. Толку которой которое оксмокс на берегу знаках они запятой? Дорогу злых, предложения всеми вершину решила имени, заголовок живет своих инициал жаренные lorem семь языком встретил семантика домах щеке одна, снова своего текстов залетают продолжил. Вопроса большой буквенных это даль ipsum курсивных которой образ, по всей свой все маленький то, переулка свое грустный собрал составитель страну силуэт своих ведущими лучше ты грамматики своего. Но не lorem родного строчка составитель необходимыми, единственное пор маленький деревни вдали за наш алфавит о, ты путь бросил злых взобравшись. Назад текст вопроса рекламных, своего бросил букв всемогущая пустился города? Все, подзаголовок то! Инициал, снова рекламных дорогу, строчка грамматики то до своего своих это образ языком пунктуация, подпоясал путь грустный необходимыми вопрос? Парадигматическая реторический несколько продолжил первую они.</p>', 'pervyy-post', 'anchor_ru'),
(3, 2, 'en', 'Another post', 'This is another post', '<p>This is another post</p>', 'another-post', 'anchor_en'),
(4, 2, 'ru', 'Другой пост', 'Это новый пост', '<p>Это новый пост</p>', 'drugoy-post', 'anchor_ru');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `views` bigint(20) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `views`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 14, 12, '2019-09-18 05:44:06', '2019-09-22 09:04:09'),
(2, 65, 4, '2019-09-18 06:28:38', '2019-09-22 09:04:22'),
(3, 1, 11, '2019-09-22 08:53:51', '2019-09-22 10:35:29'),
(4, NULL, 11, '2019-09-22 08:58:14', '2019-09-22 08:58:14');

-- --------------------------------------------------------

--
-- Структура таблицы `product_translations`
--

CREATE TABLE `product_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anchor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product_translations`
--

INSERT INTO `product_translations` (`id`, `product_id`, `locale`, `name`, `description`, `slug`, `anchor`) VALUES
(1, 1, 'en', 'yes', '<p>asdasd</p>', '12asd23wdfq3', 'anchor_en'),
(2, 1, 'ru', 'Пластик', '<p>asdasdasd</p>', 'plastik', 'anchor_ru'),
(3, 2, 'en', '23123123', '<p>asdasd</p>', '23123123', 'anchor_en'),
(4, 2, 'ru', 'ascasc', '<p>asdasd</p>', 'ascasc', 'anchor_ru'),
(5, 3, 'en', 'This is product', '<p>Fitting</p>', 'this-is-product', 'anchor_en'),
(6, 3, 'ru', 'Фитинговый продукт', '<p>продукт</p>', 'fitingovyy-produkt', 'anchor_ru'),
(7, 4, 'en', 'ertertertert', '<p>egsfdbsgbszb</p>', 'ertertertert', 'anchor_en'),
(8, 4, 'ru', 'ыпвипвип', '<p>вивпивртва</p>', 'ypvipvip', 'anchor_ru');

-- --------------------------------------------------------

--
-- Структура таблицы `recommendations`
--

CREATE TABLE `recommendations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `related_post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `related_product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `recommendation_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recommendation_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `recommendations`
--

INSERT INTO `recommendations` (`id`, `related_post_id`, `related_product_id`, `recommendation_type`, `recommendation_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'App\\Post', 2, '2019-09-18 04:42:22', '2019-09-18 04:42:22'),
(2, NULL, 1, 'App\\Product', 2, '2019-09-18 06:28:39', '2019-09-18 06:28:39'),
(5, NULL, 1, 'App\\Product', 4, '2019-09-22 08:58:15', '2019-09-22 08:58:15'),
(7, NULL, 2, 'App\\Product', 3, '2019-09-22 09:00:56', '2019-09-22 09:00:56'),
(8, NULL, 2, 'App\\Product', 1, '2019-09-22 09:04:10', '2019-09-22 09:04:10'),
(9, NULL, 3, 'App\\Product', 1, '2019-09-22 09:04:10', '2019-09-22 09:04:10');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `allowance` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `allowance`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Developer', 'alisherkasimov1994@gmail.com', NULL, 0, '$2y$10$aM8Dums08wqlzSJiP2.xUOJr9n0uoeKXudBEAKVnDaaE0zeOCIY.q', NULL, NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category_translations`
--
ALTER TABLE `category_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_translations_category_id_locale_unique` (`category_id`,`locale`),
  ADD UNIQUE KEY `category_translations_slug_unique` (`slug`),
  ADD KEY `category_translations_locale_index` (`locale`);

--
-- Индексы таблицы `characteristics`
--
ALTER TABLE `characteristics`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `characteristic_translations`
--
ALTER TABLE `characteristic_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `characteristic_translations_characteristic_id_locale_unique` (`characteristic_id`,`locale`),
  ADD KEY `characteristic_translations_locale_index` (`locale`);

--
-- Индексы таблицы `consultation_orders`
--
ALTER TABLE `consultation_orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `credential_translations`
--
ALTER TABLE `credential_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `credential_translations_credential_id_locale_unique` (`credential_id`,`locale`),
  ADD KEY `credential_translations_locale_index` (`locale`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_image_type_image_id_index` (`image_type`,`image_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `post_translations`
--
ALTER TABLE `post_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_translations_post_id_locale_unique` (`post_id`,`locale`),
  ADD UNIQUE KEY `post_translations_slug_unique` (`slug`),
  ADD KEY `post_translations_locale_index` (`locale`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_translations`
--
ALTER TABLE `product_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_translations_product_id_locale_unique` (`product_id`,`locale`),
  ADD UNIQUE KEY `product_translations_slug_unique` (`slug`),
  ADD KEY `product_translations_locale_index` (`locale`);

--
-- Индексы таблицы `recommendations`
--
ALTER TABLE `recommendations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recommendations_recommendation_type_recommendation_id_index` (`recommendation_type`,`recommendation_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `category_translations`
--
ALTER TABLE `category_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT для таблицы `characteristics`
--
ALTER TABLE `characteristics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `characteristic_translations`
--
ALTER TABLE `characteristic_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT для таблицы `consultation_orders`
--
ALTER TABLE `consultation_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `credentials`
--
ALTER TABLE `credentials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `credential_translations`
--
ALTER TABLE `credential_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `post_translations`
--
ALTER TABLE `post_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `product_translations`
--
ALTER TABLE `product_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `recommendations`
--
ALTER TABLE `recommendations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `category_translations`
--
ALTER TABLE `category_translations`
  ADD CONSTRAINT `category_translations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `characteristic_translations`
--
ALTER TABLE `characteristic_translations`
  ADD CONSTRAINT `characteristic_translations_characteristic_id_foreign` FOREIGN KEY (`characteristic_id`) REFERENCES `characteristics` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `credential_translations`
--
ALTER TABLE `credential_translations`
  ADD CONSTRAINT `credential_translations_credential_id_foreign` FOREIGN KEY (`credential_id`) REFERENCES `credentials` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `post_translations`
--
ALTER TABLE `post_translations`
  ADD CONSTRAINT `post_translations_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product_translations`
--
ALTER TABLE `product_translations`
  ADD CONSTRAINT `product_translations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
