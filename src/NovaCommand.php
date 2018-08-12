<?php

namespace MeuApp;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class NovaCommand extends Command {

    public function configure() {
        $this->setName('nova')
             ->setDescription("Permite adicionar uma nova tarefa.")
             ->addArgument("descricao", InputArgument::REQUIRED);
    }

    public function execute(InputInterface $input, OutputInterface $output) {
        $descricao = $input->getArgument("descricao");
        
        $this->db->executar("INSERT INTO tarefas('descricao') VALUES(:descricao)", compact('descricao'));

        $output->writeln("<info>Tarefa adicionada!</info>");

        $this->exibirTarefas($output);
    }
}