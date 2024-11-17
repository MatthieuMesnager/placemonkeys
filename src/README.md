# Placemonkeys

A quick and simple service for getting pictures of monkeys for use as placeholders.

## API

### Basics

To get a simple square image:

`GET /{dimensions}`

or with specific dimensions:

`GET /{width}/{height}`

### Filters

#### Greyscale

To add a greyscale filter, simply append `?greyscale` at the end of the URL.

`GET /{dimensions}?greyscale`

#### Sepia

To add a sepia filter, simply append `?sepia` at the end of the URL.

`GET /{dimensions}?sepia`

#### Blur

To get a blurred image, just add `?blur` at the end of the URL.

`GET /{dimensions}?blur`

The default amount of blur is `15`, but you can adjust it as you like by providing a value between `0` and `100`. 

#### Spooky

To get some spooky monkeys, just add `?spooky` at the end of the URL.

`GET /{dimensions}?spooky`

### Advanced

Any filters seen above can be combined.

`GET /{dimensions}?sepia&blur`

You can prevent requested images from being cached by appending `?random` at the end of the URL.

`GET /{dimensions}?random`

If you want multiple images of the same size, add the `?random` param as well as a value.

```
GET /{dimensions}?random=1
GET /{dimensions}?random=2
```
