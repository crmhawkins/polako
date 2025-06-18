<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasColumn('admin_user', 'company_id')) {
            Schema::table('admin_user', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('admin_user_access_level', 'company_id')) {
            Schema::table('admin_user_access_level', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('admin_user_department', 'company_id')) {
            Schema::table('admin_user_department', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('admin_user_notes', 'company_id')) {
            Schema::table('admin_user_notes', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('admin_user_position', 'company_id')) {
            Schema::table('admin_user_position', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('alerts', 'company_id')) {
            Schema::table('alerts', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('alert_status', 'company_id')) {
            Schema::table('alert_status', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('almacenes', 'company_id')) {
            Schema::table('almacenes', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('anio', 'company_id')) {
            Schema::table('anio', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('apartamentos', 'company_id')) {
            Schema::table('apartamentos', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('apartamento_estado', 'company_id')) {
            Schema::table('apartamento_estado', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('apartamento_limpieza', 'company_id')) {
            Schema::table('apartamento_limpieza', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('associated_expenses', 'company_id')) {
            Schema::table('associated_expenses', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('attachments', 'company_id')) {
            Schema::table('attachments', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('ayudas', 'company_id')) {
            Schema::table('ayudas', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('ayudas_estados', 'company_id')) {
            Schema::table('ayudas_estados', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('ayudas_estados_kit', 'company_id')) {
            Schema::table('ayudas_estados_kit', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('ayudas_servicios', 'company_id')) {
            Schema::table('ayudas_servicios', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('bajas', 'company_id')) {
            Schema::table('bajas', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('balance_trimester', 'company_id')) {
            Schema::table('balance_trimester', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('bank_accounts', 'company_id')) {
            Schema::table('bank_accounts', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('budgets', 'company_id')) {
            Schema::table('budgets', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('budgets_reference', 'company_id')) {
            Schema::table('budgets_reference', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('budgets_sends', 'company_id')) {
            Schema::table('budgets_sends', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('budget_concepts', 'company_id')) {
            Schema::table('budget_concepts', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('budget_concept_supplier_requests', 'company_id')) {
            Schema::table('budget_concept_supplier_requests', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('budget_concept_supplier_units', 'company_id')) {
            Schema::table('budget_concept_supplier_units', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('budget_concept_type', 'company_id')) {
            Schema::table('budget_concept_type', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('budget_reference_autoincrements', 'company_id')) {
            Schema::table('budget_reference_autoincrements', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('budget_status', 'company_id')) {
            Schema::table('budget_status', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('caja_salon', 'company_id')) {
            Schema::table('caja_salon', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('categoria_gastos', 'company_id')) {
            Schema::table('categoria_gastos', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('categoria_gastos_asociados', 'company_id')) {
            Schema::table('categoria_gastos_asociados', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('categoria_ingresos', 'company_id')) {
            Schema::table('categoria_ingresos', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('category_email', 'company_id')) {
            Schema::table('category_email', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('checklists', 'company_id')) {
            Schema::table('checklists', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('civil_status', 'company_id')) {
            Schema::table('civil_status', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('clientes', 'company_id')) {
            Schema::table('clientes', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('clients', 'company_id')) {
            Schema::table('clients', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('clients_emails', 'company_id')) {
            Schema::table('clients_emails', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('clients_faxes', 'company_id')) {
            Schema::table('clients_faxes', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('clients_local', 'company_id')) {
            Schema::table('clients_local', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('clients_phones', 'company_id')) {
            Schema::table('clients_phones', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('clients_webs', 'company_id')) {
            Schema::table('clients_webs', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('clients_x_contacts', 'company_id')) {
            Schema::table('clients_x_contacts', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('commercial_commission', 'company_id')) {
            Schema::table('commercial_commission', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('commercial_contracts', 'company_id')) {
            Schema::table('commercial_contracts', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('commercial_have_employee', 'company_id')) {
            Schema::table('commercial_have_employee', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('commercial_level', 'company_id')) {
            Schema::table('commercial_level', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('commercial_products', 'company_id')) {
            Schema::table('commercial_products', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('company_details', 'company_id')) {
            Schema::table('company_details', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('company_passwords', 'company_id')) {
            Schema::table('company_passwords', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('comprobacion', 'company_id')) {
            Schema::table('comprobacion', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('contacts', 'company_id')) {
            Schema::table('contacts', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('contacts_emails', 'company_id')) {
            Schema::table('contacts_emails', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('contacts_faxes', 'company_id')) {
            Schema::table('contacts_faxes', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('contacts_phones', 'company_id')) {
            Schema::table('contacts_phones', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('contacts_webs', 'company_id')) {
            Schema::table('contacts_webs', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('contact_by', 'company_id')) {
            Schema::table('contact_by', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('contratos', 'company_id')) {
            Schema::table('contratos', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('control_temperatura', 'company_id')) {
            Schema::table('control_temperatura', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('countries', 'company_id')) {
            Schema::table('countries', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('crm_activities_calls', 'company_id')) {
            Schema::table('crm_activities_calls', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('crm_activities_mails', 'company_id')) {
            Schema::table('crm_activities_mails', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('crm_activities_meetings', 'company_id')) {
            Schema::table('crm_activities_meetings', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('crm_activities_meetings_comments', 'company_id')) {
            Schema::table('crm_activities_meetings_comments', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('crm_activities_meetings_x_contact', 'company_id')) {
            Schema::table('crm_activities_meetings_x_contact', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('crm_activities_meetings_x_users', 'company_id')) {
            Schema::table('crm_activities_meetings_x_users', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('crm_activities_notes', 'company_id')) {
            Schema::table('crm_activities_notes', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('crm_activities_tasks', 'company_id')) {
            Schema::table('crm_activities_tasks', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('cuentas_contable', 'company_id')) {
            Schema::table('cuentas_contable', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('custom_pdf_budget', 'company_id')) {
            Schema::table('custom_pdf_budget', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('custom_pdf_budget_terms', 'company_id')) {
            Schema::table('custom_pdf_budget_terms', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('custom_pdf_invoice', 'company_id')) {
            Schema::table('custom_pdf_invoice', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('diario_caja', 'company_id')) {
            Schema::table('diario_caja', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('dominios', 'company_id')) {
            Schema::table('dominios', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('emails', 'company_id')) {
            Schema::table('emails', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('estados_diario', 'company_id')) {
            Schema::table('estados_diario', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('estados_dominios', 'company_id')) {
            Schema::table('estados_dominios', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('estados_ingresos', 'company_id')) {
            Schema::table('estados_ingresos', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('events', 'company_id')) {
            Schema::table('events', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('failed_jobs', 'company_id')) {
            Schema::table('failed_jobs', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('gastos', 'company_id')) {
            Schema::table('gastos', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('grupo_contable', 'company_id')) {
            Schema::table('grupo_contable', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('holidays', 'company_id')) {
            Schema::table('holidays', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('holidays_additions', 'company_id')) {
            Schema::table('holidays_additions', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('holidays_petition', 'company_id')) {
            Schema::table('holidays_petition', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('holidays_status', 'company_id')) {
            Schema::table('holidays_status', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('hours_monthly', 'company_id')) {
            Schema::table('hours_monthly', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('incidences', 'company_id')) {
            Schema::table('incidences', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('incidences_status', 'company_id')) {
            Schema::table('incidences_status', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('ingresos', 'company_id')) {
            Schema::table('ingresos', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('invoices', 'company_id')) {
            Schema::table('invoices', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('invoice_concepts', 'company_id')) {
            Schema::table('invoice_concepts', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('invoice_reference_autoincrements', 'company_id')) {
            Schema::table('invoice_reference_autoincrements', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('invoice_status', 'company_id')) {
            Schema::table('invoice_status', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('iva', 'company_id')) {
            Schema::table('iva', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('jobs', 'company_id')) {
            Schema::table('jobs', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('jornadas', 'company_id')) {
            Schema::table('jornadas', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('last_years_balance', 'company_id')) {
            Schema::table('last_years_balance', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('llamadas', 'company_id')) {
            Schema::table('llamadas', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('logs_email', 'company_id')) {
            Schema::table('logs_email', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('logs_tipes', 'company_id')) {
            Schema::table('logs_tipes', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('log_actions', 'company_id')) {
            Schema::table('log_actions', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('log_tasks', 'company_id')) {
            Schema::table('log_tasks', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('maquinas', 'company_id')) {
            Schema::table('maquinas', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('maquinas_categorias', 'company_id')) {
            Schema::table('maquinas_categorias', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('maquina_recaudacion', 'company_id')) {
            Schema::table('maquina_recaudacion', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('mensajes', 'company_id')) {
            Schema::table('mensajes', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('mesas', 'company_id')) {
            Schema::table('mesas', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('messages', 'company_id')) {
            Schema::table('messages', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('message_reads', 'company_id')) {
            Schema::table('message_reads', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('migrations', 'company_id')) {
            Schema::table('migrations', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('newsletters', 'company_id')) {
            Schema::table('newsletters', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('newsletters_automatic', 'company_id')) {
            Schema::table('newsletters_automatic', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('newsletters_favourites', 'company_id')) {
            Schema::table('newsletters_favourites', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('newsletters_manual', 'company_id')) {
            Schema::table('newsletters_manual', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('nominas', 'company_id')) {
            Schema::table('nominas', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('order', 'company_id')) {
            Schema::table('order', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('order_item', 'company_id')) {
            Schema::table('order_item', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        // if (!Schema::hasColumn('password_resets', 'company_id')) {
        //     Schema::table('password_resets', function (Blueprint $table) {
        //         $table->unsignedBigInteger('company_id')->nullable()->after('id');
        //         $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
        //     });
        // }

        // if (!Schema::hasColumn('password_reset_tokens', 'company_id')) {
        //     Schema::table('password_reset_tokens', function (Blueprint $table) {
        //         $table->unsignedBigInteger('company_id')->nullable()->after('id');
        //         $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
        //     });
        // }

        if (!Schema::hasColumn('pauses', 'company_id')) {
            Schema::table('pauses', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('payment_method', 'company_id')) {
            Schema::table('payment_method', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('personal_access_tokens', 'company_id')) {
            Schema::table('personal_access_tokens', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('petitions', 'company_id')) {
            Schema::table('petitions', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('priority', 'company_id')) {
            Schema::table('priority', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('product', 'company_id')) {
            Schema::table('product', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('productividades_mensuales', 'company_id')) {
            Schema::table('productividades_mensuales', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('product_category', 'company_id')) {
            Schema::table('product_category', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('projects', 'company_id')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('purchase_order', 'company_id')) {
            Schema::table('purchase_order', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('raffles', 'company_id')) {
            Schema::table('raffles', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('respuestas_mensajes', 'company_id')) {
            Schema::table('respuestas_mensajes', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('rutas', 'company_id')) {
            Schema::table('rutas', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('rutas_locales', 'company_id')) {
            Schema::table('rutas_locales', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('rutas_usuario', 'company_id')) {
            Schema::table('rutas_usuario', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('salones', 'company_id')) {
            Schema::table('salones', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('schedules', 'company_id')) {
            Schema::table('schedules', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('services', 'company_id')) {
            Schema::table('services', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('services_categories', 'company_id')) {
            Schema::table('services_categories', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('settings', 'company_id')) {
            Schema::table('settings', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('stages', 'company_id')) {
            Schema::table('stages', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('status_email', 'company_id')) {
            Schema::table('status_email', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('sub_cuentas_contable', 'company_id')) {
            Schema::table('sub_cuentas_contable', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('sub_cuenta_hija', 'company_id')) {
            Schema::table('sub_cuenta_hija', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('sub_grupo_contable', 'company_id')) {
            Schema::table('sub_grupo_contable', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('suppliers', 'company_id')) {
            Schema::table('suppliers', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('survey_clients', 'company_id')) {
            Schema::table('survey_clients', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('tasks', 'company_id')) {
            Schema::table('tasks', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('task_status', 'company_id')) {
            Schema::table('task_status', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('tickets', 'company_id')) {
            Schema::table('tickets', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('to-do', 'company_id')) {
            Schema::table('to-do', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('todo_users', 'company_id')) {
            Schema::table('todo_users', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('tpv_caja', 'company_id')) {
            Schema::table('tpv_caja', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('traspaso', 'company_id')) {
            Schema::table('traspaso', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('trello_config_user', 'company_id')) {
            Schema::table('trello_config_user', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('trello_meta', 'company_id')) {
            Schema::table('trello_meta', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('turnos', 'company_id')) {
            Schema::table('turnos', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('unclassified_expenses', 'company_id')) {
            Schema::table('unclassified_expenses', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('users', 'company_id')) {
            Schema::table('users', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('user_email_configs', 'company_id')) {
            Schema::table('user_email_configs', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

        if (!Schema::hasColumn('vehiculos', 'company_id')) {
            Schema::table('vehiculos', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after('id');
                $table->foreign('company_id')->references('id')->on('company_details')->onDelete('cascade');
            });
        }

    }

    public function down()
    {
        if (Schema::hasColumn('admin_user', 'company_id')) {
            Schema::table('admin_user', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('admin_user_access_level', 'company_id')) {
            Schema::table('admin_user_access_level', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('admin_user_department', 'company_id')) {
            Schema::table('admin_user_department', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('admin_user_notes', 'company_id')) {
            Schema::table('admin_user_notes', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('admin_user_position', 'company_id')) {
            Schema::table('admin_user_position', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('alerts', 'company_id')) {
            Schema::table('alerts', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('alert_status', 'company_id')) {
            Schema::table('alert_status', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('almacenes', 'company_id')) {
            Schema::table('almacenes', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('anio', 'company_id')) {
            Schema::table('anio', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('apartamentos', 'company_id')) {
            Schema::table('apartamentos', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('apartamento_estado', 'company_id')) {
            Schema::table('apartamento_estado', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('apartamento_limpieza', 'company_id')) {
            Schema::table('apartamento_limpieza', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('associated_expenses', 'company_id')) {
            Schema::table('associated_expenses', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('attachments', 'company_id')) {
            Schema::table('attachments', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('ayudas', 'company_id')) {
            Schema::table('ayudas', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('ayudas_estados', 'company_id')) {
            Schema::table('ayudas_estados', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('ayudas_estados_kit', 'company_id')) {
            Schema::table('ayudas_estados_kit', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('ayudas_servicios', 'company_id')) {
            Schema::table('ayudas_servicios', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('bajas', 'company_id')) {
            Schema::table('bajas', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('balance_trimester', 'company_id')) {
            Schema::table('balance_trimester', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('bank_accounts', 'company_id')) {
            Schema::table('bank_accounts', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('budgets', 'company_id')) {
            Schema::table('budgets', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('budgets_reference', 'company_id')) {
            Schema::table('budgets_reference', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('budgets_sends', 'company_id')) {
            Schema::table('budgets_sends', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('budget_concepts', 'company_id')) {
            Schema::table('budget_concepts', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('budget_concept_supplier_requests', 'company_id')) {
            Schema::table('budget_concept_supplier_requests', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('budget_concept_supplier_units', 'company_id')) {
            Schema::table('budget_concept_supplier_units', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('budget_concept_type', 'company_id')) {
            Schema::table('budget_concept_type', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('budget_reference_autoincrements', 'company_id')) {
            Schema::table('budget_reference_autoincrements', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('budget_status', 'company_id')) {
            Schema::table('budget_status', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('caja_salon', 'company_id')) {
            Schema::table('caja_salon', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('categoria_gastos', 'company_id')) {
            Schema::table('categoria_gastos', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('categoria_gastos_asociados', 'company_id')) {
            Schema::table('categoria_gastos_asociados', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('categoria_ingresos', 'company_id')) {
            Schema::table('categoria_ingresos', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('category_email', 'company_id')) {
            Schema::table('category_email', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('checklists', 'company_id')) {
            Schema::table('checklists', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('civil_status', 'company_id')) {
            Schema::table('civil_status', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('clientes', 'company_id')) {
            Schema::table('clientes', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('clients', 'company_id')) {
            Schema::table('clients', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('clients_emails', 'company_id')) {
            Schema::table('clients_emails', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('clients_faxes', 'company_id')) {
            Schema::table('clients_faxes', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('clients_local', 'company_id')) {
            Schema::table('clients_local', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('clients_phones', 'company_id')) {
            Schema::table('clients_phones', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('clients_webs', 'company_id')) {
            Schema::table('clients_webs', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('clients_x_contacts', 'company_id')) {
            Schema::table('clients_x_contacts', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('commercial_commission', 'company_id')) {
            Schema::table('commercial_commission', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('commercial_contracts', 'company_id')) {
            Schema::table('commercial_contracts', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('commercial_have_employee', 'company_id')) {
            Schema::table('commercial_have_employee', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('commercial_level', 'company_id')) {
            Schema::table('commercial_level', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('commercial_products', 'company_id')) {
            Schema::table('commercial_products', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('company_details', 'company_id')) {
            Schema::table('company_details', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('company_passwords', 'company_id')) {
            Schema::table('company_passwords', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('comprobacion', 'company_id')) {
            Schema::table('comprobacion', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('contacts', 'company_id')) {
            Schema::table('contacts', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('contacts_emails', 'company_id')) {
            Schema::table('contacts_emails', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('contacts_faxes', 'company_id')) {
            Schema::table('contacts_faxes', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('contacts_phones', 'company_id')) {
            Schema::table('contacts_phones', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('contacts_webs', 'company_id')) {
            Schema::table('contacts_webs', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('contact_by', 'company_id')) {
            Schema::table('contact_by', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('contratos', 'company_id')) {
            Schema::table('contratos', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('control_temperatura', 'company_id')) {
            Schema::table('control_temperatura', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('countries', 'company_id')) {
            Schema::table('countries', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('crm_activities_calls', 'company_id')) {
            Schema::table('crm_activities_calls', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('crm_activities_mails', 'company_id')) {
            Schema::table('crm_activities_mails', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('crm_activities_meetings', 'company_id')) {
            Schema::table('crm_activities_meetings', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('crm_activities_meetings_comments', 'company_id')) {
            Schema::table('crm_activities_meetings_comments', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('crm_activities_meetings_x_contact', 'company_id')) {
            Schema::table('crm_activities_meetings_x_contact', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('crm_activities_meetings_x_users', 'company_id')) {
            Schema::table('crm_activities_meetings_x_users', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('crm_activities_notes', 'company_id')) {
            Schema::table('crm_activities_notes', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('crm_activities_tasks', 'company_id')) {
            Schema::table('crm_activities_tasks', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('cuentas_contable', 'company_id')) {
            Schema::table('cuentas_contable', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('custom_pdf_budget', 'company_id')) {
            Schema::table('custom_pdf_budget', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('custom_pdf_budget_terms', 'company_id')) {
            Schema::table('custom_pdf_budget_terms', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('custom_pdf_invoice', 'company_id')) {
            Schema::table('custom_pdf_invoice', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('diario_caja', 'company_id')) {
            Schema::table('diario_caja', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('dominios', 'company_id')) {
            Schema::table('dominios', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('emails', 'company_id')) {
            Schema::table('emails', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('estados_diario', 'company_id')) {
            Schema::table('estados_diario', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('estados_dominios', 'company_id')) {
            Schema::table('estados_dominios', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('estados_ingresos', 'company_id')) {
            Schema::table('estados_ingresos', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('events', 'company_id')) {
            Schema::table('events', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('failed_jobs', 'company_id')) {
            Schema::table('failed_jobs', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('gastos', 'company_id')) {
            Schema::table('gastos', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('grupo_contable', 'company_id')) {
            Schema::table('grupo_contable', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('holidays', 'company_id')) {
            Schema::table('holidays', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('holidays_additions', 'company_id')) {
            Schema::table('holidays_additions', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('holidays_petition', 'company_id')) {
            Schema::table('holidays_petition', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('holidays_status', 'company_id')) {
            Schema::table('holidays_status', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('hours_monthly', 'company_id')) {
            Schema::table('hours_monthly', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('incidences', 'company_id')) {
            Schema::table('incidences', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('incidences_status', 'company_id')) {
            Schema::table('incidences_status', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('ingresos', 'company_id')) {
            Schema::table('ingresos', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('invoices', 'company_id')) {
            Schema::table('invoices', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('invoice_concepts', 'company_id')) {
            Schema::table('invoice_concepts', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('invoice_reference_autoincrements', 'company_id')) {
            Schema::table('invoice_reference_autoincrements', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('invoice_status', 'company_id')) {
            Schema::table('invoice_status', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('iva', 'company_id')) {
            Schema::table('iva', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('jobs', 'company_id')) {
            Schema::table('jobs', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('jornadas', 'company_id')) {
            Schema::table('jornadas', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('last_years_balance', 'company_id')) {
            Schema::table('last_years_balance', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('llamadas', 'company_id')) {
            Schema::table('llamadas', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('logs_email', 'company_id')) {
            Schema::table('logs_email', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('logs_tipes', 'company_id')) {
            Schema::table('logs_tipes', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('log_actions', 'company_id')) {
            Schema::table('log_actions', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('log_tasks', 'company_id')) {
            Schema::table('log_tasks', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('maquinas', 'company_id')) {
            Schema::table('maquinas', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('maquinas_categorias', 'company_id')) {
            Schema::table('maquinas_categorias', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('maquina_recaudacion', 'company_id')) {
            Schema::table('maquina_recaudacion', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('mensajes', 'company_id')) {
            Schema::table('mensajes', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('mesas', 'company_id')) {
            Schema::table('mesas', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('messages', 'company_id')) {
            Schema::table('messages', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('message_reads', 'company_id')) {
            Schema::table('message_reads', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('migrations', 'company_id')) {
            Schema::table('migrations', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('newsletters', 'company_id')) {
            Schema::table('newsletters', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('newsletters_automatic', 'company_id')) {
            Schema::table('newsletters_automatic', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('newsletters_favourites', 'company_id')) {
            Schema::table('newsletters_favourites', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('newsletters_manual', 'company_id')) {
            Schema::table('newsletters_manual', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('nominas', 'company_id')) {
            Schema::table('nominas', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('order', 'company_id')) {
            Schema::table('order', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('order_item', 'company_id')) {
            Schema::table('order_item', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('password_resets', 'company_id')) {
            Schema::table('password_resets', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('password_reset_tokens', 'company_id')) {
            Schema::table('password_reset_tokens', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('pauses', 'company_id')) {
            Schema::table('pauses', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('payment_method', 'company_id')) {
            Schema::table('payment_method', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('personal_access_tokens', 'company_id')) {
            Schema::table('personal_access_tokens', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('petitions', 'company_id')) {
            Schema::table('petitions', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('priority', 'company_id')) {
            Schema::table('priority', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('product', 'company_id')) {
            Schema::table('product', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('productividades_mensuales', 'company_id')) {
            Schema::table('productividades_mensuales', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('product_category', 'company_id')) {
            Schema::table('product_category', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('projects', 'company_id')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('purchase_order', 'company_id')) {
            Schema::table('purchase_order', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('raffles', 'company_id')) {
            Schema::table('raffles', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('respuestas_mensajes', 'company_id')) {
            Schema::table('respuestas_mensajes', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('rutas', 'company_id')) {
            Schema::table('rutas', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('rutas_locales', 'company_id')) {
            Schema::table('rutas_locales', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('rutas_usuario', 'company_id')) {
            Schema::table('rutas_usuario', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('salones', 'company_id')) {
            Schema::table('salones', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('schedules', 'company_id')) {
            Schema::table('schedules', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('services', 'company_id')) {
            Schema::table('services', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('services_categories', 'company_id')) {
            Schema::table('services_categories', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('settings', 'company_id')) {
            Schema::table('settings', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('stages', 'company_id')) {
            Schema::table('stages', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('status_email', 'company_id')) {
            Schema::table('status_email', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('sub_cuentas_contable', 'company_id')) {
            Schema::table('sub_cuentas_contable', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('sub_cuenta_hija', 'company_id')) {
            Schema::table('sub_cuenta_hija', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('sub_grupo_contable', 'company_id')) {
            Schema::table('sub_grupo_contable', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('suppliers', 'company_id')) {
            Schema::table('suppliers', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('survey_clients', 'company_id')) {
            Schema::table('survey_clients', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('tasks', 'company_id')) {
            Schema::table('tasks', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('task_status', 'company_id')) {
            Schema::table('task_status', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('tickets', 'company_id')) {
            Schema::table('tickets', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('to-do', 'company_id')) {
            Schema::table('to-do', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('todo_users', 'company_id')) {
            Schema::table('todo_users', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('tpv_caja', 'company_id')) {
            Schema::table('tpv_caja', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('traspaso', 'company_id')) {
            Schema::table('traspaso', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('trello_config_user', 'company_id')) {
            Schema::table('trello_config_user', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('trello_meta', 'company_id')) {
            Schema::table('trello_meta', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('turnos', 'company_id')) {
            Schema::table('turnos', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('unclassified_expenses', 'company_id')) {
            Schema::table('unclassified_expenses', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('users', 'company_id')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('user_email_configs', 'company_id')) {
            Schema::table('user_email_configs', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

        if (Schema::hasColumn('vehiculos', 'company_id')) {
            Schema::table('vehiculos', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            });
        }

    }
};
