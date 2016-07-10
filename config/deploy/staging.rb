set :deploy_to, '/var/www/html/staging.helixnexus.uk'
set :branch, "development"

set :ssh_options, {
  user: "x4j5",
  keys: "~/.ssh/id_rsa",
  forward_agent: true,
}

server '178.62.106.219', roles: [:app, :web, :db], :primary => true


task :deploy do
  on roles(:web), in: :sequence, wait: 5 do
    info 'Switch .htaccess file'
    execute "mv -f #{deploy_to}/current/config/deploy/files/.htaccess_staging #{deploy_to}/current/public/.htaccess"

    info "Move Correct SS Environtment into Place"
    execute "mv -f #{deploy_to}/current/config/deploy/files/_ss_environment_staging.php #{deploy_to}/current/public/_ss_environment.php"

    after :deploy, "customSilverStripeTasks:composer_install"
  end
end
