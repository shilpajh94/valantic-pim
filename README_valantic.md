# Additional README for valantic

## Local development
For local development with ddev create the file `config/local/ddev.yaml` with the following content:
```yaml
doctrine:
  dbal:
    connections:
      default:
        url: "mysql://db:db@ddev-contitech-pimcore-db:3306/db"
        server_version: '8.0.36-0ubuntu0.22.04.1'
        mapping_types:
          enum: string
          bit: boolean

flysystem:
  storages:
    pimcore.asset.storage:
      adapter: local
      visibility: private
      directory_visibility: public
      options:
        directory: '%kernel.project_dir%/public/var/assets'

valantic_elastica_bridge:
  client:
    dsn: '%env(ELASTICSEARCH_URL)%'
```

Then, run `ddev start` in the project root.
