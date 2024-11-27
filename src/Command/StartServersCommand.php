<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;
use Symfony\Component\Console\Helper\ProgressBar;

#[AsCommand(
    name: 'app:start-servers',
    description: 'Starts both Symfony server and Vite server at the same time.'
)]
class StartServersCommand extends Command
{

    protected function configure()
    {
        $this
            ->setDescription('Starts both Symfony server and Vite server at the same time.')
            ->setHelp('This command will start both the Symfony server and the Vite server in parallel.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Starting Symfony and Vite servers...');

        // Je crée deux processus pour démarrer les serveurs Symfony et Vite
        $symfonyProcess = new Process(['symfony', 'serve', '-d']);
        $viteProcess = new Process(['npm', 'run', 'dev']);

        // Je démarre les processus
        $symfonyProcess->start();
        $viteProcess->start();

        // J'utilise un ProgressBar pour afficher l'état de démarrage des processus
        $progressBar = new ProgressBar($output, 2);
        $progressBar->start();

        // Tant que les processus sont en cours d'exécution, j'avance la ProgressBar
        while ($symfonyProcess->isRunning() || $viteProcess->isRunning()) {
            if ($symfonyProcess->isRunning()) {
                $progressBar->advance();
            }
            if ($viteProcess->isRunning()) {
                $progressBar->advance();
            }
            usleep(500000); // Pause pour éviter une surcharge CPU
        }

        // Si tout est bien démarré je termine la ProgressBar et j'affiche un message de succès
        $progressBar->finish();
        $output->writeln('');
        $output->writeln('<info>Both servers are running!</info>');

        return Command::SUCCESS;
    }
}