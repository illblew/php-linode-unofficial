php-linode-unofficial
===================


This is just a little wrapper I'm working on to ease the testing of the Linode API v4. If
you think something is done incorrectly or dumb please feel free to open an issue or
contribute. I am in no way an expert and have never written one of these before.

----------

You can sign up for the Alpha [HERE](https://alpha.linode.com/).

You can find the developer docs [HERE](https://developers.linode.com/).


> **Note:**

> - I can't promise I'll finish this without contributions.
> - I'm hacking this in the minimal spare time I have at the moment.
> - I don't care if you don't like PHP. Use something else.

Hacking on this
-------

[Set up composer](https://getcomposer.org/doc/01-basic-usage.md)

To mess with this in the project root:

```bash
cp config.ini.example config.ini
vi config.ini
ln -s example/index.php
# getcomposer.org
php composer.phar install
php -S 0.0.0.0:8080
```
