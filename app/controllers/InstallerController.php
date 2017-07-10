<?php

namespace controllers;

use DB\SQL\Schema;

class InstallerController
{

    function db()
    {
        $f3 = \Base::instance();
        $schema = new Schema($f3->get('DB'));

        $tables = $schema->getTables();

        // WidgetNegative
        $name = 'widget_negativecircle';
        if (in_array($name, $tables))
            $schema->dropTable($name);
        $table = $schema->createTable($name);
        $table->addColumn('user')->type($schema::DT_INT);
        $table->addColumn('step')->type($schema::DT_INT);
        $table->addColumn('text')->type($schema::DT_TEXT);
        $table->addColumn('date_modified')->type($schema::DT_DATETIME);
        $table->build();
        echo "Table $name Created";
        // End WidgetNegative

        // Widget Positive Experience
        $name = 'widget_positive_experience';
        if (in_array($name, $tables)) {
            $schema->dropTable($name);
        }
        $table = $schema->createTable($name);
        $table->addColumn('user_id')->type($schema::DT_INT);
        $table->addColumn('note')->type($schema::DT_TEXT);
        $table->addColumn('create_date')->type($schema::DT_DATETIME);
        $table->build();
        echo "Table $name Created";
        // End Widget Positive Experience

    }

}
