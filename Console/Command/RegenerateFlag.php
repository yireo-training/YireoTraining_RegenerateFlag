<?php

namespace YireoTraining\RegenerateFlag\Console\Command;

use Magento\Framework\Code\GeneratedFiles;
use Magento\Framework\Filesystem\Directory\WriteFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RegenerateFlag extends Command
{
    public function __construct(
        private WriteFactory $writeFactory,
        private GeneratedFiles $generatedFiles,
        ?string $name = null
    )  {
        parent::__construct($name);
    }

    /**
     * Initialization of the command.
     */
    protected function configure()
    {
        $this->setName('test:regenerate:flag');
        $this->setDescription('Test for regenerate flag file');
        parent::configure();
    }

    /**
     * CLI command description.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $write = $this->writeFactory->create(BP);
        $output->writeln('Path: '.GeneratedFiles::REGENERATE_FLAG);

        $output->writeln('Original path: '.$write->getAbsolutePath(GeneratedFiles::REGENERATE_FLAG));
        $output->writeln('Without slash: '.$write->getAbsolutePath('var/.regenerate'));

        return Command::SUCCESS;
    }
}
