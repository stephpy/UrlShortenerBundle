SlyUrlShortenerBundle
====================

## 1. Configuration bundle informations

You have to define all Links/Entities relations from your application `config.yml` file.

Here is an example with a `Content` entity, a `content_show` route, using Google shortener service (`googl`):

```yaml
sly_url_shortener:
    entities:
        Acme\DemoBundle\Entity\Content:
            provider: googl
            route: content_show
```

Another example with a `Person` entity, a `person_show` route, using Bitly shortener service (`bitly`):

```yaml
sly_url_shortener:
    entities:
        Acme\DemoBundle\Entity\Person:
            provider: bitly
            api:
                username: Me
                key: R_MyS3cr3tK3yMyS3cr3tK3yMyS3cr3tK3y
            route: person_show
```

As you can see, some providers (like bit.ly) needs API informations.
These are declared with `api` array, which can accept `username`, `password` and `key`,
in function of what providers need.

Soon: an `internal` provider will be used for a self and independant short links management.

## 2. Get/Render an entity short link from Twig view

Render a short link from an object/entity is so easy.
You just have to use dedicated `render_short_url` Twig function to do it.

Here is a little example:

```php
<?php
// DemoController.php

    /**
     * @Route("/content/{id}.html", name="content_show")
     * @Template()
     */
    public function showContent(Content $content)
    {
        return array(
            'content' => $content, // a content is passed to Twig view
        );
    }
```

```twig
{# showContent.html.twig #}

<h2>Here is the title: {{ content.title }}</h2>

<p>Here is the <a href="{{ render_short_url(content) }}">short generated link</a> from Content entity.</p>
```

To be continued.