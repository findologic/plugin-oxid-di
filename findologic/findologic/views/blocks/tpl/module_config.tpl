[{$smarty.block.parent}]
[{if $oModule->getInfo('id') === 'findologic'}]
    [{assign var="validation" value=$oView->saveConfVars()}]
    [{if $validation === false}]
        <p style="margin-left:15px;color:red;font-size:16px;font-style:italic;">[{ oxmultilang ident="WRONG_KEY_MESSAGE" }]</p>
    [{/if}]
[{/if}]