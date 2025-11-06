/*******************************************************************************
 * Curso: Engenharia de Software
 * Disciplina: Linguagem e Técnicas de Programação
 * Professor: Flores
 * Turma: ESOFT-2B
 * Componentes: (Seus nomes e RAs)
 * Descritivo: Script ATUALIZADO com imagens locais.
 ******************************************************************************/
CREATE DATABASE IF NOT EXISTS db_steamkeys_globais;
USE db_steamkeys_globais;

CREATE TABLE `plataformas` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `nome` VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE `produtos` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `nome` VARCHAR(255) NOT NULL,
    `descricao` TEXT,
    `preco` DECIMAL(10, 2) NOT NULL,
    `url_imagem` VARCHAR(255),
    `plataforma_id` INT,
    FOREIGN KEY (`plataforma_id`) REFERENCES `plataformas`(`id`) ON DELETE CASCADE
);

INSERT INTO `plataformas` (`nome`) VALUES
('Steam Offline'), ('Xbox & Microsoft Store - Keys'), ('Steam CD Key');

-- INSERTS ATUALIZADOS COM OS CAMINHOS DAS IMAGENS LOCAIS
INSERT INTO `produtos` (`nome`, `descricao`, `preco`, `url_imagem`, `plataforma_id`) VALUES
('Elden Ring', 'Um vasto mundo de fantasia sombria onde os jogadores podem explorar e lutar.', 9.90, 'public/images/elden-ring.jpg', 1),
('God of War Ragnarök', 'Junte-se a Kratos e Atreus em uma jornada mítica por respostas antes que o Ragnarök comece.', 9.80, 'public/images/god-of-war-ragnarok.jpg', 1),
('Marvel\'s Spider-Man 2', 'Os Spider-Men, Peter Parker e Miles Morales, estão de volta para uma nova aventura.', 8.99, 'public/images/spiderman-2.jpg', 2),
('Sekiro: Shadows Die Twice', 'Explore o Japão no final do século XVI, um período brutal com conflitos constantes.', 14.99, 'public/images/sekiro.jpg', 3),
('The Last of Us Parte I', 'Experimente a narrativa emocionante e os personagens inesquecíveis de The Last of Us.', 8.90, 'public/images/the-last-of-us-1.jpg', 1);