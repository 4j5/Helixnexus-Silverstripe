# config valid only for current version of Capistrano
lock '3.4.0'

set :application, 'KWHolidays'
set :repo_url, 'git@github.com:mmk-digital/kingswood-holidays.git'

set :linked_dirs, %w{public/assets public/silverstripe-cache}

set :pty, true

set :npm_target_path, -> { release_path.join('public') } # We set our package.json inside public
set :npm_flags, '--no-spin'

set :file_permissions_paths, ["#{deploy_to}/shared/public/assets", "#{deploy_to}/shared/public/silverstripe-cache"]
set :file_permissions_users, ["x4j5"]
set :file_permissions_chmod_mode, "0777"

SSHKit.config.command_map[:node] = "/usr/bin/node"
set :grunt_file, -> { release_path.join('public/Gruntfile.js') }


#Default things to be done after every deploy with a SilverStripe project.
namespace :customSilverStripeTasks do
  task :composer_install do
    on roles(:web), in: :sequence, wait: 5 do

      info "Run Composer Install"
      execute "cd #{deploy_to}/current/public && composer install"

      after "customSilverStripeTasks:composer_install", "customSilverStripeTasks:dev_build"

    end
  end
  task :dev_build do
      on roles(:web) do

        info "Run SS dev/build task"
        execute "php -f #{deploy_to}/current/public/framework/cli-script.php dev/build flush=all"

      end
    end
end
