<?php

$installer = $this;

$installer->startSetup();

// Create table 'capitalism/player'
$table = $installer->getConnection()
    ->newTable($installer->getTable('capitalism/player'))
    ->addColumn('player_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'nullable'  => false,
        'primary'   => true,
        'unsigned'  => true,
        ), 'Player ID')
    ->addColumn('user_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned'  => true,
        'nullable'  => false,
        'default'   => '0',
        ), 'User ID')
    ->addColumn('username', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        'nullable'  => false,
        ), 'User Name')
	->addColumn('points_current', Varien_Db_Ddl_Table::TYPE_DECIMAL, '12,4', array(
        'nullable'  => false,
        'default'   => '0.0000',
        ), 'Current Points')
	->addColumn('money_current', Varien_Db_Ddl_Table::TYPE_DECIMAL, '12,4', array(
        'nullable'  => false,
        'default'   => '0.0000',
        ), 'Current Money')
    ->addColumn('created_date', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        ), 'Player Created Date')
    ->addColumn('updated_date', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        ), 'Player Created Date')
    ->addIndex(
        $installer->getIdxName('capitalism/player', 'user_id', Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE),
        'user_id',
        array('type'=>Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE))
    ->addForeignKey($installer->getFkName('capitalism/player', 'user_id', 'user/entity', 'entity_id'),
        'user_id', $installer->getTable('user/entity'), 'entity_id',
        Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
    ->setComment('Capitalism Player Table');
$installer->getConnection()->createTable($table);

// Create table 'capitalism/player_transaction'
$table = $installer->getConnection()
    ->newTable($installer->getTable('capitalism/player_transaction'))
    ->addColumn('player_transaction_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'nullable'  => false,
        'primary'   => true,
        ), 'Player Transaction ID')
    ->addColumn('giving_player_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'nullable'  => false,
        'unsigned'  => true,
        ), 'Giving Player ID')
    ->addColumn('receiving_player_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'nullable'  => false,
        'unsigned'  => true,
        ), 'Receiving Player ID')
	->addColumn('points_given', Varien_Db_Ddl_Table::TYPE_DECIMAL, '12,4', array(
        'nullable'  => false,
        'default'   => '0.0000',
        ), 'Points Given')
	->addColumn('money_received', Varien_Db_Ddl_Table::TYPE_DECIMAL, '12,4', array(
        'nullable'  => false,
        'default'   => '0.0000',
        ), 'Points Given')
    ->addColumn('created_date', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        ), 'Transaction Date')
    ->addIndex($installer->getIdxName('capitalism/player_transaction', array('giving_player_id')),
        array('giving_player_id'))
    ->addForeignKey($installer->getFkName('capitalism/player_transaction', 'giving_player_id', 'capitalism/player', 'player_id'),
        'giving_player_id', $installer->getTable('capitalism/player'), 'player_id',
        Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
    ->addIndex($installer->getIdxName('capitalism/player_transaction', array('receiving_player_id')),
        array('receiving_player_id'))
    ->addForeignKey($installer->getFkName('capitalism/player_transaction', 'receiving_player_id', 'capitalism/player', 'player_id'),
        'receiving_player_id', $installer->getTable('capitalism/player'), 'player_id',
        Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
    ->setComment('Transactions between players');
$installer->getConnection()->createTable($table);

$installer->endSetup();

