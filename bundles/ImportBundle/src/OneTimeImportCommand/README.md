 One Time PTG Import

 * File Path: /home/praganosis/Working/CSV/ptg_import.csv (Your File path on system)
 * Command: bin/console conti:onetimeimport:ptg /home/praganosis/Working/CSV/ptg_import.csv
 * Des: This command will import and enrich PTG data at class, base, skeleton, fert level including bricks too.
 * Just run the above command, it will create all required temp table if it does not exist into system
 * After creation of temp table, it will process the sheet to import and enrich data.
 * This command will update the following tables

     object_brick_query_PTGBase_1
     object_brick_store_PTGBase_1
     object_brick_localized_PTGBase_1
     object_brick_localized_query_PTGBase_1_en

     object_brick_query_PTGSkeleton_1
     object_brick_store_PTGSkeleton_1

     object_brick_query_PTGFert_1
     object_brick_store_PTGFert_1

     object_brick_query_BeltsFert_1
     object_brick_store_BeltsFert_1

     object_brick_query_SynchronousFert_1
     object_brick_store_SynchronousFert_1

     object_brick_query_MetalFert_1
     object_brick_store_MetalFert_1

     object_localized_data_1
     object_localized_query_1_en