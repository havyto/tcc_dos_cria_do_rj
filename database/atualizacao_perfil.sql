-- Atualização necessária para o Perfil funcional (foto + edição de perfil)
-- Rode este script no phpMyAdmin (banco ghost_gamer) ANTES de usar o site.
--
-- Se der erro "Duplicate column name 'foto'", é porque este script já
-- foi executado antes -- pode ignorar o erro.

ALTER TABLE `clientes`
    ADD COLUMN `foto` VARCHAR(255) DEFAULT NULL AFTER `nickname`;
