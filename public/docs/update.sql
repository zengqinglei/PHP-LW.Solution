use loliweixin;
alter table users add column remember_token varchar(100) null;
-- alter table users drop column remember_token;