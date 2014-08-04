<?php namespace Agandra\AmpGenerator\Command;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Foundation\Artisan;
use \DB;

class CodeUpdate extends Command {

	protected $name = 'amp:user';

	protected $description = 'Create User Model, Repo, and Service files along with controllers/views to create and edit users.';

	public function fire() {

		$app = \Config::get('amp-generator::app');

		if($app === '')
			$this->info('Please fill out package config file.')

		return false;

		$this->call('down');

		$this->info('Pulling from Git Repo');
		$this->line(`git pull`);
		$this->line('');

		$this->info('Flushing Caches');
		$this->line(`composer dump-autoload`);
		$this->line(\Cache::flush());
		$this->call('clear-compiled');
		$this->line('');

		if($this->input->getOption('expunge')) {
			$this->call('db:expunge', array('--force'=>true));
		}
		$this->call('migrate', array('--force'=>true));

		$this->call('optimize');

		$this->call('up');

	}

}